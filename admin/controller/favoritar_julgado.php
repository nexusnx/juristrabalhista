<?php 
	session_start();

	if(isset($_POST['id'])){
		include_once('dbcon.php');

		$id = $_POST['id'];
		$idUsuario = $_SESSION['user_id'];

		$select = "SELECT * FROM julgados_favoritos WHERE julgado = '$id' AND id_usuario = '$idUsuario'";
		$exec = mysqli_query($conn, $select);
		$num = mysqli_num_rows($exec);

		if($num > 0){
			$sql = "DELETE FROM julgados_favoritos WHERE julgado = '$id' AND id_usuario = '$idUsuario'";
			mysqli_query($conn, $sql);
		} else {
			$sql = "INSERT INTO julgados_favoritos (id_usuario, julgado) VALUES ('$idUsuario', '$id')";
			mysqli_query($conn, $sql);
		}
		mysqli_close($conn);
	}
	return $num;
?>