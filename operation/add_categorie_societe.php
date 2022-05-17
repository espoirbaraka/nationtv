<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$designation = $_POST['categorie'];

		$conn = $pdo->open();

		
			try{
				$stmt = $conn->prepare("INSERT INTO t_categorie_societe(Categorie) VALUES (:categorie)");
				$stmt->execute(['categorie'=>$designation]);
				$_SESSION['success'] = 'Categorie ajouté';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout presentateur';
	}

	header('location: ../categorie_societe.php');

?>
