<!-- Add -->
<div class="modal fade" id="addpresentateur">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter Nouveau Presentateur</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/add_presentateur.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nom" class="col-sm-3 control-label">Nom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="postnom" class="col-sm-3 control-label">Postnom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="postnom" name="postnom" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="prenom" class="col-sm-3 control-label">Prenom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telephone" class="col-sm-3 control-label">Telephone</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="telephone" name="telephone" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mail" class="col-sm-3 control-label">Mail</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="mail" name="mail" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="adresse" class="col-sm-3 control-label">Adresse</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="adresse" name="adresse"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
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
              <h4 class="modal-title"><b>Modifier l'identité du présentateur</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/update_presentateur.php">
                <input type="hidden" class="presentateur" name="id">
                <div class="form-group">
                    <label for="edit_nom" class="col-sm-3 control-label">Nom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_nom" name="nom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_postnom" class="col-sm-3 control-label">Postnom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_postnom" name="postnom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_prenom" class="col-sm-3 control-label">Prenom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_prenom" name="prenom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_telephone" class="col-sm-3 control-label">Telephone</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_telephone" name="telephone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_mail" class="col-sm-3 control-label">Mail</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="edit_mail" name="mail">
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
              <form class="form-horizontal" method="POST" action="operation/delete_presentateur.php">
                <input type="hidden" class="presentateur" name="id">
                <div class="text-center">
                    <p>SUPPRIMER PRESENTATEUR</p>
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

<!-- Update Photo -->
<div class="modal fade" id="modifier_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/update_photo_presentateur.php" enctype="multipart/form-data">
                <input type="hidden" class="presentateur" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Modifier</button>
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
              <form class="form-horizontal" method="POST" action="operation/active_presentateur.php">
                <input type="hidden" class="presentateur" name="id">
                <div class="text-center">
                    <p>ACTIVER PRESENTATEUR</p>
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


     