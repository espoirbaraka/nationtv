<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$concerne = $_POST['concerne'];
		$redacteur = $_POST['redacteur'];
		$client = $_POST['client'];
        $detail = $_POST['detail'];
        $date = date('Y-m-d');
		$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("INSERT INTO t_redaction(Details, DateRedaction, Redacteur, Client, CodePrevision) VALUES (:detail, :date, :redacteur, :client, :prevision)");
				$stmt->execute(['detail'=>$detail, 'date'=>$date, 'redacteur'=>$redacteur, 'client'=>$client, 'prevision'=>$concerne]);
				$_SESSION['success'] = 'Redaction ajouté';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout presentateur';
	}

	header('location: ../redaction.php');

?>
