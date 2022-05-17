<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['edit'])){
        $id = $_POST['id'];
		$nom = $_POST['nom'];
        $responsable = $_POST['responsable'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse'];

		$conn = $pdo->open();;

		try{
			$stmt = $conn->prepare("UPDATE t_societe SET NomSociete=:nom, ResponsableSociete=:responsable, TelephoneSociete=:telephone, AdresseSociete=:adresse WHERE CodeSociete=:id");
			$stmt->execute(['nom'=>$nom, 'responsable'=>$responsable, 'telephone'=>$telephone, 'adresse'=>$adresse, 'id'=>$id]);
			$_SESSION['success'] = 'Societe modifié avec succès';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Complétez le formulaire de modification de l\'utilisateur';
	}

	header('location: ../societe.php');

?>
