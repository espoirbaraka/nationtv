<?php 
	include '../includes/sessionconnected.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT CodeRedaction,DateRedaction,Details,Client,t_redaction.CodePrevision,Redacteur,Nature,pu 
        FROM t_redaction
        INNER JOIN t_prevision_emission
        ON t_redaction.CodePrevision=t_prevision_emission.CodePrevisionEmission 
        WHERE CodeRedaction=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>