<!-- Add prevision publicite -->
<div class="modal fade" id="addprevisionemission">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter une nouvelle prevision des emission et redactions</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/add_prevision_emission.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nature" class="col-sm-3 control-label">Nature</label>

                    <div class="col-sm-9">
                        <input type="text" name="nature" id="nature" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="timing" class="col-sm-3 control-label">Timing</label>

                    <div class="col-sm-9">
                        <input type="text" name="timing" id="timing" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pu" class="col-sm-3 control-label">Prix Unitaire</label>

                    <div class="col-sm-9">
                    <input type="number" name="pu" id="pu" class="form-control">
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


<!-- Delete prevision emission et redaction-->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Suppression...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/delete_prevision_emission.php">
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
