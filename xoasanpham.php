<?php

require('./ketnoidatabase.php');
$id = (int) $_GET['id'];
$image = "SELECT imgURL FROM `sanpham` WHERE `sanpham`.`id` = $id";
$query = mysqli_query($conn, $image);
$after = mysqli_fetch_assoc($query);

if (file_exists("./images/".$after['imgURL'])) {
    unlink("/images/".$after['imgURL']);
}
$sql = "DELETE FROM `sanpham` WHERE `sanpham`.`id` = $id";
mysqli_query($conn, $sql);
header("Location:trangchu.php");

?>