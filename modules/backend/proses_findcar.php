<?php include '../../config/koneksi.php';
	$getParam = $_GET['q'];
	if ($getParam =='') {
		$getCars = "SELECT *
					FROM merek_mobil m 
					JOIN tipe_mobil tm 
					ON m.id_merek_mobil=tm.id_merek_mobil";
		$result = mysqli_query($db_con,$getCars);
		$response = array();
		while ($hasil   = mysqli_fetch_array($result)) {
			$response[] = $hasil;
		}
		echo json_encode($response);
	}else{

		$getCars = "SELECT *
					FROM merek_mobil m 
					JOIN tipe_mobil tm 
					ON m.id_merek_mobil=tm.id_merek_mobil  
					WHERE m.nama_kendaraan='$getParam'";
		$result = mysqli_query($db_con,$getCars);
		$response = array();
		while ($hasil   = mysqli_fetch_array($result)) {
			$response[] = $hasil;
		}
		echo json_encode($response);
	}

?>