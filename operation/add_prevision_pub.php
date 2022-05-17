<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
        $typesociete = $_POST['typesociete'];
        $pubnormal = $_POST['pubnormal'];
        $pubpareine = $_POST['pubpareine'];

		$conn = $pdo->open();

        $stmt = $conn->prepare("SELECT * FROM t_prevision_pub WHERE CodeCategorieSociete = :categorie");
        $stmt->execute(['categorie'=>$typesociete]);
        $previsionexist = $stmt->rowCount();
        if($previsionexist == 0)
        {
		
			try{
				$stmt = $conn->prepare("INSERT INTO t_prevision_pub(CodeCategorieSociete,PrevisionPubliciteNormal,PrevisionPublicitePareine) VALUES (:categorie, :pubnormal, :pubpareine)");
				$stmt->execute(['categorie'=>$typesociete, 'pubnormal'=>$pubnormal, 'pubpareine'=>$pubpareine]);
				$_SESSION['success'] = 'Prevision enregistrée avec succès';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}else{
            try{
				$stmt = $conn->prepare("UPDATE t_prevision_pub SET CodeCategorieSociete=:categorie, PrevisionPubliciteNormal=:pubnormal,PrevisionPublicitePareine=:pubpareine WHERE CodeCategorieSociete=:categorie2");
				$stmt->execute(['categorie'=>$typesociete,'pubnormal'=>$pubnormal, 'pubpareine'=>$pubpareine, 'categorie2'=>$typesociete]);
				$_SESSION['success'] = 'Prevision modifiée avec succès';

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

	header('location: ../prevision_publicite.php');

?>
