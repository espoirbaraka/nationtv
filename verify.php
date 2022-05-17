<?php
	include 'includes/sessionoutconnection.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		$username = $_POST['utilisateur'];
		$password = sha1($_POST['pass']);
		try{
			$stmt = $conn->prepare("SELECT * FROM t_user WHERE Username = ? AND Password = ?");
            $stmt->execute(array($username,$password));
			$nbre = $stmt->rowCount();
			
			if($nbre == 1){
				$row = $stmt->fetch();
				if($row['status'] != 1){
							$_SESSION['CodeUser'] = $row['CodeUser'];
				}
				else{
					$_SESSION['error'] = 'Compte non activé.';
				}
			}
			else{
				$_SESSION['error'] = 'Utilisateur inexistant';
			}
		}
		catch(PDOException $e){
			echo "Erreur de connexion: " . $e->getMessage();
		}
	


	}
	else{
		$_SESSION['error'] = 'Entrez vos identifiants de connexion d\'abord';
	}

	$pdo->close();
	header('location: index.php');

?>
