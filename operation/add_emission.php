<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$designation = $_POST['designation'];
		$presentateur = $_POST['presentateur'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM t_emission WHERE DesignationEmission = ?");
        $stmt->execute(array($designation));
		$emissionexist = $stmt->rowCount();

		if($emissionexist > 0){
			$_SESSION['error'] = 'Une emission avec le meme nom existe déjà';
		}
		else{
			$date = date('Y-m-d');
			try{
				$stmt = $conn->prepare("INSERT INTO t_emission(DesignationEmission, CodePresentateur, Created_on, Status) VALUES (:designation, :presentateur, :date, :status)");
				$stmt->execute(['designation'=>$designation, 'presentateur'=>$presentateur, 'date'=>$date, 'status'=>1]);
				$_SESSION['success'] = 'Emission ajouté';

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

	header('location: ../emission.php');

?>
