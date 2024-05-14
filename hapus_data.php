<?php
if (isset($_GET['id'])) {
    $idToDelete = $_GET['id'];

    $jsonString = file_get_contents('data_login.json');

    $proyek = json_decode($jsonString, true);

    foreach ($proyek as $key => $project) {
        if ($project['id'] == $idToDelete) {
            unset($proyek[$key]);
            break;
        }
    }

    $updatedJsonString = json_encode($proyek);

    file_put_contents('data_login.json', $updatedJsonString);

    header('Location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
?>