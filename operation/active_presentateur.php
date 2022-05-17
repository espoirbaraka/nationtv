<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['activate'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE t_presentateur SET Status=:status WHERE IdPresentateur=:id");
			$stmt->execute(['status'=>1, 'id'=>$id]);
			$_SESSION['success'] = 'Presentateur activé avec succès';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'Selectionnez l\'utilisateur à activer';
	}

	header('location: ../presentateur.php');
?>
