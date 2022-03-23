<?php 
include '../connection.php'; 
$id = $_GET['id'];

$query = "DELETE FROM penumpang WHERE id_penumpang = '$id'";
$sql = ociparse($conn, $query);
$hasil = ociexecute($sql);

if ($hasil == true) {
    showMessage("Berhasil menghapus data penumpang!");
    redirect("index.php");
} else
    showMessage("Gagal menghapus data penumpang!");
?>