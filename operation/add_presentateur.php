<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$nom = $_POST['nom'];
		$postnom = $_POST['postnom'];
		$prenom = $_POST['prenom'];
		$telephone = $_POST['telephone'];
		$adresse = $_POST['adresse'];
        $mail = $_POST['mail'];
        $presentateur = $nom.''.$postnom.''.$prenom;

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM t_presentateur WHERE CONCAT(NomPresentateur, PostnomPresentateur, PrenomPresentateur) = ?");
        $stmt->execute(array($presentateur));
		$presentateurexist = $stmt->rowCount();

		if($presentateurexist > 0){
			$_SESSION['error'] = 'Un presentateur ayant le meme nom existe déjà';
		}
		else{
			$filename = $_FILES['photo']['name'];
			$date = date('Y-m-d');
			if(!empty($filename)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../img/'.$filename);	
			}
			try{
				$stmt = $conn->prepare("INSERT INTO t_presentateur(NomPresentateur, PostnomPresentateur, PrenomPresentateur, TelephonePresentateur, MailPresentateur, AdressePresentateur, PhotoPresentateur, DateAjout, Status) VALUES (:nom, :postnom, :prenom, :telephone, :mail, :adresse, :photo, :date, :status)");
				$stmt->execute(['nom'=>$nom, 'postnom'=>$postnom, 'prenom'=>$prenom, 'telephone'=>$telephone, 'mail'=>$mail, 'adresse'=>$adresse, 'photo'=>$filename, 'date'=>$date, 'status'=>0]);
				$_SESSION['success'] = 'Présentateur ajouté';

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

	header('location: ../presentateur.php');

?>
