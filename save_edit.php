<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $username = $_POST['username'];
    $status = $_POST['status'];

    $jsonString = file_get_contents('data_login.json');
    $magang = json_decode($jsonString, true);

    $magang[$id]['nama'] = $nama;
    $magang[$id]['nim'] = $nim;
    $magang[$id]['kelas'] = $kelas;
    $magang[$id]['jurusan'] = $jurusan;
    $magang[$id]['username'] = $username;
    $magang[$id]['status'] = $status;

    $updatedJsonString = json_encode($magang);
    file_put_contents('data_login.json', $updatedJsonString);

    header('Location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
?>
