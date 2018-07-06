<?php include '../../../config/koneksi.php';
$id = isset($_GET['jenis_layanan']) ? strval($_GET['jenis_layanan']) : 0;

$getServices = "SELECT * FROM layanan WHERE id_layanan='$id'";
$result = mysqli_query($db_con,$getServices);
// $response = array();
while ($hasil = mysqli_fetch_array($result)) {
	$response[] = $hasil;
}
echo json_encode($response);
?>