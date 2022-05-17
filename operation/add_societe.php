<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$nom = $_POST['nom'];
		$responsable = $_POST['responsable'];
		$telephone = $_POST['telephone'];
		$adresse = $_POST['adresse'];
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM t_societe WHERE NomSociete = ?");
        $stmt->execute(array($nom));
		$societeexist = $stmt->rowCount();

		if($societeexist > 0){
			$_SESSION['error'] = 'Une societe ayant le meme nom existe déjà';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO t_societe(NomSociete, ResponsableSociete, TelephoneSociete, AdresseSociete) VALUES (:nom, :responsable, :telephone, :adresse)");
				$stmt->execute(['nom'=>$nom, 'responsable'=>$responsable, 'telephone'=>$telephone, 'adresse'=>$adresse]);
				$_SESSION['success'] = 'Société ajouté';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout presentateur';
	}

	header('location: ../societe.php');

?>
