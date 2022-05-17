<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['program'])){
        $id = $_POST['id'];
		$jour = $_POST['jour'];
        $debut = $_POST['debut'];
        $fin = $_POST['fin'];

		$conn = $pdo->open();;

		try{
			$stmt = $conn->prepare("INSERT INTO t_programme(HeureDebut,HeureFin,CodeJour,CodeEmission) VALUES(:debut, :fin, :jour, :emission)");
			$stmt->execute(['debut'=>$debut, 'fin'=>$fin, 'jour'=>$jour, 'emission'=>$id]);
			$_SESSION['success'] = 'Programme ajouter a cette emission';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Complétez le formulaire de modification de l\'utilisateur';
	}

	header('location: ../emission.php');

?>
