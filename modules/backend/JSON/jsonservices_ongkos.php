<?php include '../../../config/koneksi.php';

	$id = isset($_GET['ongkos']) ? intval($_GET['ongkos']) : 0;

	$getOngkos = "SELECT * FROM ongkos_jemput WHERE id_ongkos='$id'";
	$result = mysqli_query($db_con,$getOngkos);
	// $response = array();
	while ($hasil   = mysqli_fetch_array($result)) {
		$response[] = $hasil;
	}
	echo json_encode($response);

?>