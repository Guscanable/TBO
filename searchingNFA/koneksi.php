<!-- Simpan dalam format .php -->
<?php
// koneksi ke server database
$db = new mysqli("localhost", "root", "", "db_dokumen");
//$db = mysqli_connect($servername, $database, $username, $password);

// mesin
$var = trim($_GET['search'], " ");

$search = $var;
$search = explode(" ", $search);
$loop = count($search);
$index = 0;
for ($i = 0; $i < $loop; $i++) {
    if ($search[$i] == '') unset($search[$i]);
    else {
        $bantu = $search[$i];
        unset($search[$i]);
        $search[$index] = $bantu;
        $index++;
    }
}

$bagilaman = $_GET['bagilaman'];

//query koneksi ke database mengambil id
$query = "SELECT * FROM dokumen WHERE id BETWEEN 1 AND " . $bagilaman;
$result = $db->query($query);
$result = $result->fetch_all(MYSQLI_ASSOC);

//variabel atribut dokumen
$total = 0;
$dokumen = [];
$judul = [];
$deskripsi = [];
$kata = [];
$keyword = [];

function searching($text, $search)
{
    $c = 0;
    for ($i = 0; $i < strlen($text); $i++) {
        if (strtolower($text[$i]) == strtolower($search[$c])) {
            $c++; //next state
        } else {
            $c = 0; //kembali ke startstate
        }
        if ($c == strlen($search)) {
            if ($text[$i - $c] != " " || $text[$i + 1] != " ") {
                $c = 0; //kembali ke startstate
                continue;
            };
            //mengambil kata 
            $kiri = $i - $c;
            if ($kiri < 0) $kiri = 0;
            $startkiri = $kiri - 25;
            if ($startkiri < 0) {
                $startkiri = 0;
                $katakiri = substr($text, $startkiri, $kiri);
            } else {
                $tmp = 25;
                //mencari kata dari kiri - ketemu spasi
                while ($text[$startkiri] != " ") {
                    $startkiri--;
                    $tmp++;
                }
                $katakiri = substr($text, $startkiri, $tmp);
            }
            $katakanan = substr($text, $i + 1, 200);
            $s['kalimat'] = $katakiri . " " . "<b>" . $search . "</b>" . $katakanan . "...";
            break;
        }
    }
    $s['state'] = $c;
    return $s;
}

//quintuple nfa
$t = str_replace(" ", "", $var);
$initialState = 0;
$totalState = strlen($t);
$finalState = [];
for ($i = 0; $i < count($search); $i++) {
    array_push($finalState, strlen($search[$i]));
}

foreach ($result as $s) {
    $kalimat = [];
    $isi = $s['isi'];
    $data = []; //mengetahui variabel index ke berapa
    for ($i = 0; $i < count($search); $i++) {
        $final = searching($isi, $search[$i]);
        if ($final['state'] == strlen($search[$i])) {
            array_push($data, $i);
            array_push($kalimat, $final['kalimat']);
        }
    }
    if (!empty($data)) {
        $total++;
        array_push($dokumen, $s['id']);
        array_push($judul, $s['judul']);
        array_push($deskripsi, $kalimat[count($kalimat) - 1]);
        $tmp = "";
        for ($i = 0; $i < count($data); $i++) {
            $tmp = $tmp . $search[$data[$i]] . ", ";
        }
        array_push($kata, $tmp);
    }
}
