<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
        $nature = $_POST['nature'];
        $pu = $_POST['pu'];
        $timing = $_POST['timing'];

		$conn = $pdo->open();

		
			try{
				$stmt = $conn->prepare("INSERT INTO t_prevision_emission(Nature,Timing,pu) VALUES (:nature, :timing, :pu)");
				$stmt->execute(['nature'=>$nature, 'timing'=>$timing, 'pu'=>$pu]);
				$_SESSION['success'] = 'Prevision enregistrée avec succès';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout presentateur';
	}

	header('location: ../prevision_emission.php');

?>
