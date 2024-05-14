<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pencarian Magang</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        th,
        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Daftar Login Mahasiswa</h1>

    <table border="1" cellspacing="0" id="magangTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Username</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            function fetchAndDisplayMagang() {
                $.getJSON("data_login.json", function(data) {
                    $("#magangTable tbody").empty();

                    $.each(data, function(index, magang) {
                        var newRow = $("<tr>");
                        newRow.append("<td>" + magang.id + "</td>");
                        newRow.append("<td>" + magang.nama + "</td>");
                        newRow.append("<td>" + magang.nim + "</td>");
                        newRow.append("<td>" + magang.kelas + "</td>");
                        newRow.append("<td>" + magang.jurusan + "</td>");
                        newRow.append("<td>" + magang.username + "</td>");
                        newRow.append("<td>" + magang.status + "</td>");
                        newRow.append("<td><button class='hapus-btn' data-id='" + magang.id + "'>Hapus</button><button class='edit-btn' data-id='" + magang.id + "'>Edit</button><button class='reset-btn' data-id='" + magang.id + "'>Reset Password</button></td>");
                        $("#magangTable tbody").append(newRow);
                    });
                });
            }

            fetchAndDisplayMagang();

            $(document).on("click", ".hapus-btn", function() {
                var id = $(this).data("id");
                $.get("hapus_data.php?id=" + id, function(response) {
                    if (response === "success") {
                        fetchAndDisplayMagang();
                    } else {
                        alert("Gagal menghapus data.");
                    }
                });
            });

            $(document).on("click", ".edit-btn", function() {
                var id = $(this).data("id");
                window.location.href = "edit.php?id=" + id;
            });

            $(document).on("click", ".reset-btn", function() {
                var id = $(this).data("id");
                $.getJSON("data_login.json", function(data) {
                    data[id].password = "";
                    $.ajax({
                        url: "reset.php",
                        type: "POST",
                        contentType: "application/json",
                        data: JSON.stringify(data),
                        success: function(response) {
                            if (response === "success") {
                                alert("Password berhasil direset.");
                                fetchAndDisplayMagang();
                            } else {
                                alert("Gagal mereset password.");
                            }
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>
