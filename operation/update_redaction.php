<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['edit'])){
        $id = $_POST['id'];
		$client = $_POST['client'];
        $redacteur = $_POST['redacteur'];
        $type = $_POST['type'];
        $detail = $_POST['detail'];

		$conn = $pdo->open();;

		try{
			$stmt = $conn->prepare("UPDATE t_redaction SET CodePrevision=:type, Redacteur=:redacteur, Client=:client, Details=:detail WHERE CodeRedaction=:id");
			$stmt->execute(['type'=>$type, 'redacteur'=>$redacteur, 'client'=>$client, 'detail'=>$detail, 'id'=>$id]);
			$_SESSION['success'] = 'Redaction modifié avec succès';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Complétez le formulaire de modification de l\'utilisateur';
	}

	header('location: ../redaction.php');

?>
