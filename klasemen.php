<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Group A Piala Asia Qatar U-23</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<br>

<h2><center> Data Group A Piala Asia Qatar U-23 </center></h2>
<h3><center><p> Pertandingan <span id="tanggalwaktu"></span></p></h3></center>
<script>
var dt = new Date();
document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleString();
</script>
<h3><center> Aldi Mahendra Prassetya/201011400007 </center></h3> 
<?php
// Daftar timnas secara default
$default_teams = array(
    array("Qatar U-23", 3, 2, 1, 0), // Qatar U-23
    array("Indonesia U-23", 3, 2, 0, 1), // Indonesia U-23
    array("Australia U-23", 3, 0, 2, 1), // Australia U-23
    array("Yordania U-23", 3, 0, 1, 2), // Yordania U-23
);

// Baca data dari file data.txt
$data = file("data.txt", FILE_IGNORE_NEW_LINES);

// Inisialisasi array untuk menyimpan data klasemen
$klasemen = array();

// Pisahkan setiap baris data menjadi array
foreach ($data as $line) {
    $klasemen[] = explode(",", $line);
}

// Gabungkan data default dengan data dari file data.txt
$klasemen = array_merge($default_teams, $klasemen);

// Urutkan data berdasarkan jumlah poin
usort($klasemen, function($a, $b) {
    return ($b[2] * 3 + $b[3]) - ($a[2] * 3 + $a[3]);
});

// Tampilkan data dalam bentuk tabel HTML
echo "<table>
        <tr>
            <th>Posisi</th>
            <th>Negara</th>
            <th>P</th>
            <th>M</th>
            <th>S</th>
            <th>K</th>
            <th>Poin</th>
        </tr>";
$posisi = 1;
foreach ($klasemen as $team) {
    echo "<tr>
            <td>".$posisi++."</td>
            <td>".$team[0]."</td>
            <td>".$team[1]."</td>
            <td>".$team[2]."</td>
            <td>".$team[3]."</td>
            <td>".$team[4]."</td>
            <td>".($team[2] * 3 + $team[3])."</td>
        </tr>";
}
echo "</table>";

// Tombol Update Data
echo "<a href='input_data.php'><button>Update Data </button> </a>";

// Tombol Hapus Data
echo "<form action='hapus_data.php' method='post'>";
echo "<input type='submit' value='Hapus Data'>";
echo "</form>";
?>

</body>
</html>
