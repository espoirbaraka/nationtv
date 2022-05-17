<?php
include '../includes/sessionconnected.php';

$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM t_categorie_societe");
$stmt->execute();
		
$pdo->close();
?>
<!-- Add prevision publicite -->
<div class="modal fade" id="addprevision">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter une nouvelle prevision pour la publicite</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/add_prevision_pub.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="typesociete" class="col-sm-3 control-label">Type de societe</label>

                    <div class="col-sm-9">
                    <select name="typesociete" id="typesociete" class="form-control">
                        <?php
                        foreach($stmt as $societe)
                        {
                            ?>
                                <option value="<?php echo $societe['CodeCategorieSociete'] ?>"><?php echo $societe['Categorie'] ?></option>
                            
                            <?php
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pubnormal" class="col-sm-3 control-label">Publicite Normal</label>

                    <div class="col-sm-9">
                    <input type="number" name="pubnormal" id="pubnormal" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pubpareine" class="col-sm-3 control-label">Publicite Pareinée</label>

                    <div class="col-sm-9">
                    <input type="number" name="pubpareine" id="pubpareine" class="form-control">
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




<!-- Delete prevision publicite -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Suppression...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/delete_prevision_pub.php">
                <input type="hidden" class="prevision" name="id">
                <div class="text-center">
                    <p>SUPPRIMER LA PREVISION</p>
                    <h2 class="bold fullname"></h2>
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

