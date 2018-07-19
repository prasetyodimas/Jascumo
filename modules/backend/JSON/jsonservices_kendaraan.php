<?php include '../../../config/koneksi.php';

	$act = $_GET['act'];
	if ($act=='finding') {

		$id  = isset($_GET['q']) ? strval($_GET['quotemeta(str)']) : 0;

		$getOngkos = "SELECT * FROM tipe_mobil WHERE id_merek_mobil='$id'";
		$result = mysqli_query($db_con,$getOngkos);
		// $response = array();
		while ($hasil   = mysqli_fetch_array($result)) {
			$response[] = $hasil;
		}
		echo json_encode($response);

	}
?>