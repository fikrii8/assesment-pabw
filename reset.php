<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jsonString = file_get_contents('php://input');
    $jsonData = json_decode($jsonString, true);

    if (is_array($jsonData)) {
        $jsonEncoded = json_encode($jsonData, JSON_PRETTY_PRINT);

        if (file_put_contents('data_login.json', $jsonEncoded)) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
