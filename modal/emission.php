<!-- Add -->
<?php
include '../includes/sessionconnected.php';

$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM t_presentateur");
$stmt->execute();
$stmt2 = $conn->prepare("SELECT * FROM t_presentateur");
$stmt2->execute();
$jour = $conn->prepare("SELECT * FROM t_jour");
$jour->execute();
		
$pdo->close();
?>
<div class="modal fade" id="addemission">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter une nouvelle emission</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/add_emission.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="designation" class="col-sm-3 control-label">Designation</label>

                    <div class="col-sm-9">
                    <textarea class="form-control" id="designation" name="designation"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="presentateur" class="col-sm-3 control-label">Presentateur</label>

                    <div class="col-sm-9">
                      <select name="presentateur" id="presentateur" class="form-control" multiple>
                        <?php
                            foreach($stmt as $row){
                                ?>
                            <option value="<?php echo $row['IdPresentateur'] ?>"><?php echo $row['NomPresentateur'].' '.$row['PostnomPresentateur'].' '.$row['PrenomPresentateur']; ?></option>
                            <?php
                            }
                            ?>
                        
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Ajouter</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Modifier l'emission</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/update_emission.php">
                <input type="hidden" class="emission" name="id">
                <div class="form-group">
                    <label for="designation" class="col-sm-3 control-label">Designation</label>

                    <div class="col-sm-9">
                    <textarea class="form-control" id="edit_designation" name="designation"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="presentateur" class="col-sm-3 control-label">Presentateur</label>

                    <div class="col-sm-9">
                      <select name="presentateur" id="presentateur" class="form-control">
                        <?php
                            foreach($stmt2 as $row2){
                                ?>
                            <option value="<?php echo $row2['IdPresentateur'] ?>"><?php echo $row2['NomPresentateur'].' '.$row2['PostnomPresentateur'].' '.$row2['PrenomPresentateur']; ?></option>
                            <?php
                            }
                            ?>
                        
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Modifier</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Activate -->
<div class="modal fade" id="activate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Activation...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/active_emission.php">
                <input type="hidden" class="emission" name="id">
                <div class="text-center">
                    <p>ACTIVER EMISSION</p>
                    <?php
                    // $conn = $pdo->open();
                    // $id = $_POST['id'];       
                    // $stmt = $conn->prepare("SELECT * FROM t_programme WHERE CodeProgramme = $id");
                    // $stmt->execute();
                        
                    // $pdo->close();
                    ?>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-success btn-flat" name="activate"><i class="fa fa-check"></i> Activer</button>
              </form>
            </div>
        </div>
    </div>
</div> 

<!-- Desactivate -->
<div class="modal fade" id="desactivate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Desctivation...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/desactive_emission.php">
                <input type="hidden" class="emission" name="id">
                <div class="text-center">
                    <p>DESACTIVER EMISSION</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-danger btn-flat" name="desactivate"><i class="fa fa-check"></i> Desactiver</button>
              </form>
            </div>
        </div>
    </div>
</div> 


<!-- Add program -->
<div class="modal fade" id="program">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter un programme a cette emission</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/add_programme.php">
                <input type="hidden" class="emission" name="id">
                <div class="form-group">
                    <label for="jour" class="col-sm-3 control-label">Jour</label>

                    <div class="col-sm-9">
                    <select name="jour" id="jour" class="form-control">
                        <?php
                            foreach($jour as $row){
                                ?>
                            <option value="<?php echo $row['CodeJour'] ?>"><?php echo $row['Jour']; ?></option>
                            <?php
                            }
                            ?>
                        
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="debut" class="col-sm-3 control-label">Debut</label>

                    <div class="col-sm-9">
                      <input type="time" class="form-control" id="debut" name="debut">
                    </div>
                </div>
                <div class="form-group">
                    <label for="fin" class="col-sm-3 control-label">Fin</label>

                    <div class="col-sm-9">
                      <input type="time" class="form-control" id="fin" name="fin">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-success btn-flat" name="program"><i class="fa fa-check-square-o"></i> Modifier</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- Voir le programme -->
<div class="modal fade" id="voir_programme">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Voir le programme</b></h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" method="POST" action="operation/view_program.php">
              <input type="hidden" class="emission" name="id">
                <div class="text-left">
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              
              </form>
            </div>
        </div>
    </div>
</div> 