<?php
include '../includes/sessionconnected.php';

$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM t_categorie_societe");
$stmt->execute();
$stmt2 = $conn->prepare("SELECT * FROM t_societe");
$stmt2->execute();
$stmt3 = $conn->prepare("SELECT * FROM t_emission");
$stmt3->execute();
$pdo->close();
?>
<!-- Add -->
<div class="modal fade" id="addpublicite">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter une nouvelle publicite</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/add_publicite.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="concerne" class="col-sm-3 control-label">Concerne</label>

                    <div class="col-sm-9">
                        <textarea class="form-control" id="concerne" name="concerne"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="type" class="col-sm-3 control-label">Type de client</label>

                    <div class="col-sm-9">
                        <select name="type" id="type" class="form-control">
                            <?php
                            foreach($stmt as $type){
                                ?>
                                <option value="<?php echo $type['CodeCategorieSociete']; ?>"><?php echo $type['Categorie'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="client" class="col-sm-3 control-label">Societe cliente</label>

                    <div class="col-sm-9">
                        <select name="client" id="client" class="form-control">
                            <?php
                            foreach($stmt2 as $societe){
                                ?>
                                <option value="<?php echo $societe['CodeSociete']; ?>"><?php echo $societe['NomSociete'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="typepub" class="col-sm-3 control-label">Type de publicite</label>

                    <div class="col-sm-9">
                        <select name="typepub" id="typepub" class="form-control">
                                <option value="">PUBLICITE NORMAL</option>
                                <option value="">PUBLICITE PAREINE</option>
                                
                        </select>
                    </div>
                </div>
                <p style="color: red; text-align: center;">!!!! Attention!! completer cette case que si la publicité est pareiné</p>
                <div class="form-group">
                    <label for="emission" class="col-sm-3 control-label">Emission de pareinage</label>

                    <div class="col-sm-9">
                        <select name="emission" id="emission" class="form-control">
                            <?php
                            foreach($stmt3 as $emission){
                                ?>
                                <option value="<?php echo $emission['CodeEmission']; ?>"><?php echo $emission['DesignationEmission'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Enregistrer</button>
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
              <h4 class="modal-title"><b>Modifier cette redaction</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/update_redaction.php">
                <input type="hidden" class="redaction" name="id">
                <div class="form-group">
                    <label for="edit_type" class="col-sm-3 control-label">Type</label>

                    <div class="col-sm-9">
                      <select name="type" id="edit_type" class="form-control">
                      <?php
                        foreach($stmt2 as $prevision){
                            ?>
                            <option value="<?php echo $prevision['CodePrevisionEmission']; ?>"><?php echo $prevision['Nature']; ?></option>
                            <?php
                        }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_client" class="col-sm-3 control-label">Client</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_client" name="client">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_redacteur" class="col-sm-3 control-label">Redacteur</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_redacteur" name="redacteur">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_detail" class="col-sm-3 control-label">Detail</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_detail" name="detail"></textarea>
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

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Suppression...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/delete_redaction.php">
                <input type="hidden" class="redaction" name="id">
                <div class="text-center">
                    <p>SUPPRIMER CETTE REDACTION</p>
                    <h2 class="bold nom"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Supprimer</button>
              </form>
            </div>
        </div>
    </div>
</div>

