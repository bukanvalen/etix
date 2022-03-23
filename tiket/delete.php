<?php 
include '../connection.php'; 
$id = $_GET['id'];

$query = "DELETE FROM tiket WHERE id_tiket = '$id'";
$sql = ociparse($conn, $query);
$hasil = ociexecute($sql);

if ($hasil == true) {
    showMessage("Berhasil menghapus data tiket!");
    redirect("index.php");
} else
    showMessage("Gagal menghapus data tiket!");
?>