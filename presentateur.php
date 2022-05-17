<?php 
  include 'includes/sessionconnected.php';
  include 'includes/format.php'; 
?>
<?php 
  // $today = date('Y-m-d');
  // $year = date('Y');
  // if(isset($_GET['year'])){
  //   $year = $_GET['year'];
  // }

  $conn = $pdo->open();
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Présentateur d'emission
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active">Présentateur d'emission</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Erreur!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Succès!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <!-- debut tableau -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addpresentateur" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
            </div>
            <div class="box-body">
              <div style="overfow: auto;">
              <table id="tableau" class="table table-bordered">
                <thead>
                  <th>Photo</th>
                  <th>Nom</th>
                  <th>Status</th>
                  <th>Telephone</th>
                  <th>Mail</th>
                  <th>Date d'ajout</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM t_presentateur");
                      $stmt->execute();
                      foreach($stmt as $presentateur){
                        $image = (!empty($presentateur['PhotoPresentateur'])) ? 'img/'.$presentateur['PhotoPresentateur'] : 'dist/img/avatar.png';
                        $status = ($presentateur['Status']) ? '<span class="label label-success">active</span>' : '<span class="label label-danger">non verifié</span>';
                        $active = (!$presentateur['Status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="'.$presentateur['IdPresentateur'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
                        echo "
                          <tr>
                            <td>
                              <img src='".$image."' height='30px' width='30px'>
                              <span class='pull-right'><a href='#modifier_photo' class='photo' data-toggle='modal' data-id='".$presentateur['IdPresentateur']."'><i class='fa fa-edit'></i></a></span>
                            </td>
                            <td>".$presentateur['NomPresentateur'].' '.$presentateur['PostnomPresentateur']."</td>
                            <td>
                              ".$status."
                              ".$active."
                            </td>
                            <td>".$presentateur['TelephonePresentateur']."</td>
                            <td>".$presentateur['MailPresentateur']."</td>
                            <td>".date('M d, Y', strtotime($presentateur['DateAjout']))."</td>
                            
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$presentateur['IdPresentateur']."'><i class='fa fa-edit'></i> Modifier</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$presentateur['IdPresentateur']."'><i class='fa fa-trash'></i> Supprimer</button>
                            </td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </tbody>
              </table>
              </div>
              
            </div>
          </div>
        </div>
      </div>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'modal/presentateur.php'; ?>
</div>
<!-- ./wrapper -->

<!-- Chart Data -->
<?php

?>

<?php 
?>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.status', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/presentateur_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.presentateur').val(response.IdPresentateur);
      $('#edit_mail').val(response.MailPresentateur);
      $('#edit_nom').val(response.NomPresentateur);
      $('#edit_postnom').val(response.PostnomPresentateur);
      $('#edit_prenom').val(response.PrenomPresentateur);
      $('#edit_adresse').val(response.AdressePresentateur);
      $('#edit_telephone').val(response.TelephonePresentateur);
      $('.fullname').html(response.NomPresentateur+' '+response.PostnomPresentateur+' '+response.PrenomPresentateur);
    }
  });
}
</script>
</body>
</html>
