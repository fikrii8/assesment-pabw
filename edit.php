<?php
if (isset($_GET['id'])) {
    $idToEdit = $_GET['id'];

    $jsonString = file_get_contents('data_login.json');
    $magang = json_decode($jsonString, true);

    $data = $magang[$idToEdit];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<body>
    <h1>Edit Data Mahasiswa</h1>
    <form action="save_edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $idToEdit; ?>">
        Nama: <input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>
        NIM: <input type="text" name="nim" value="<?php echo $data['nim']; ?>"><br>
        Kelas: <input type="text" name="kelas" value="<?php echo $data['kelas']; ?>"><br>
        Jurusan: <input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>"><br>
        Username: <input type="text" name="username" value="<?php echo $data['username']; ?>"><br>
        Status: <input type="text" name="status" value="<?php echo $data['status']; ?>"><br>
        <input type="submit" value="Simpan">
    </form>
</body>

</html>

<?php
} else {
    header('Location: index.php');
    exit();
}
?>
