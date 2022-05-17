<!-- Add -->
<div class="modal fade" id="addpresentateur">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter une nouvelle société</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/add_societe.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nom" class="col-sm-3 control-label">Nom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="responsable" class="col-sm-3 control-label">Responsable</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="responsable" name="responsable" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telephone" class="col-sm-3 control-label">Telephone</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="telephone" name="telephone" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="adresse" class="col-sm-3 control-label">Adresse</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="adresse" name="adresse"></textarea>
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
              <h4 class="modal-title"><b>Modifier cette societe</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/update_societe.php">
                <input type="hidden" class="societe" name="id">
                <div class="form-group">
                    <label for="edit_nom" class="col-sm-3 control-label">Nom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_nom" name="nom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_responsable" class="col-sm-3 control-label">Responsable</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_responsable" name="responsable">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_telephone" class="col-sm-3 control-label">Telephone</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_telephone" name="telephone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_adresse" class="col-sm-3 control-label">Adresse</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_adresse" name="adresse"></textarea>
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
              <form class="form-horizontal" method="POST" action="operation/delete_societe.php">
                <input type="hidden" class="societe" name="id">
                <div class="text-center">
                    <p>SUPPRIMER PRESENTATEUR</p>
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

