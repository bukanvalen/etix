<?php 
include '../connection.php'; 
$id = $_GET['id'];

$query = "DELETE FROM kereta WHERE id_kereta = '$id'";
$sql = ociparse($conn, $query);
$hasil = ociexecute($sql);

if ($hasil == true) {
    showMessage("Berhasil menghapus data kereta!");
    redirect("index.php");
} else
    showMessage("Gagal menghapus data kereta!");
?>