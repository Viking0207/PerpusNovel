<?php
include 'connect.php';

$title = $_POST['title'];
$author = $_POST['author'];
$year = $_POST['year'];
$sypno = $_POST['sypno'];

$img = $_FILES['img']['name'];
$target = "../uploads/" . basename($img);

if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
    $sql = "INSERT INTO data_perpus (judul_buku, pengarang, tahun, sypnosis, gambar) VALUES ('$title', '$author', '$year', '$sypno', '$img')";
    if (mysqli_query($connect, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
} else {
    echo "Failed to upload image.";
}
?>