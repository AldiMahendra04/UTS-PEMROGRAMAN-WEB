<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Klasemen</title>
</head>
<body>

<h2>Input Data Klasemen Piala Asia U-23 Qatar Group A</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="negara">Nama Negara:</label>
    <select name="negara" id="negara">
        <option value="Qatar U-23">Qatar U-23</option>
        <option value="Indonesia U-23">Indonesia U-23</option>
        <option value="Australia U-23">Australia U-23</option>
        <option value="Yordania U-23">Yordania U-23</option>
    </select><br><br>
    <label for="P">Jumlah Pertandingan (P):</label>
    <input type="text" name="P" id="P"><br><br>
    <label for="M">Jumlah Menang (M):</label>
    <input type="text" name="M" id="M"><br><br>
    <label for="S">Jumlah Seri (S):</label>
    <input type="text" name="S" id="S"><br><br>
    <label for="K">Jumlah Kalah (K):</label>
    <input type="text" name="K" id="K"><br><br>
    <input type="submit" value="Submit">
</form>

<?php
// Tangkap data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $negara = $_POST['negara'];
    $P = $_POST['P'];
    $M = $_POST['M'];
    $S = $_POST['S'];
    $K = $_POST['K'];

    // Tulis data ke dalam file data.txt
    $data = "$negara,$P,$M,$S,$K\n";
    file_put_contents("data.txt", $data, FILE_APPEND | LOCK_EX);

    // Redirect ke halaman klasemen.php setelah data berhasil disimpan
    header("Location: klasemen.php");
    exit(); // Pastikan kode berhenti di sini untuk mencegah eksekusi lebih lanjut
}
?>

</body>
</html>
