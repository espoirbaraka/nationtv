<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$nom = $_POST['nom'];
		$postnom = $_POST['postnom'];
		$prenom = $_POST['prenom'];
		$telephone = $_POST['telephone'];
		$mail = $_POST['mail'];
		$adresse = $_POST['adresse'];

		$conn = $pdo->open();
		// $stmt = $conn->prepare("SELECT * FROM t_presentateur WHERE IdPresentateur=:id");
		// $stmt->execute(['id'=>$id]);
		// $row = $stmt->fetch();

		try{
			$stmt = $conn->prepare("UPDATE t_presentateur SET NomPresentateur=:nom, PostnomPresentateur=:postnom, PrenomPresentateur=:prenom, TelephonePresentateur=:telephone, MailPresentateur=:mail, AdressePresentateur=:adresse WHERE IdPresentateur=:id");
			$stmt->execute(['nom'=>$nom, 'postnom'=>$postnom, 'prenom'=>$prenom, 'telephone'=>$telephone, 'mail'=>$mail, 'adresse'=>$adresse, 'id'=>$id]);
			$_SESSION['success'] = 'Presentateur modifié avec succès';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Complétez le formulaire de modification de l\'utilisateur';
	}

	header('location: ../presentateur.php');

?>
