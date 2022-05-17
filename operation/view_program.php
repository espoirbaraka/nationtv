<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['edit'])){
        $id = $_POST['id'];
		$designation = $_POST['designation'];
		$presentateur = $_POST['presentateur'];

		$conn = $pdo->open();;

		try{
			$stmt = $conn->prepare("UPDATE t_emission SET DesignationEmission=:design, CodePresentateur=:presentateur WHERE CodeEmission=:id");
			$stmt->execute(['design'=>$designation, 'presentateur'=>$presentateur, 'id'=>$id]);
			$_SESSION['success'] = 'Emission modifié avec succès';

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