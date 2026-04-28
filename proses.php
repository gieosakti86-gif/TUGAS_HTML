<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['name']);
    $umur = mysqli_real_escape_string($conn, $_POST['age']);

    $query = "INSERT INTO users (nama, umur) VALUES ('$nama', '$umur')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php?status=sukses");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>