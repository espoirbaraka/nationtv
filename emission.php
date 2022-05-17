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
        Nos emissions
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active">Nos emissions</li>
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
              <a href="#addemission" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
            </div>
            <div class="box-body">
              <table id="tableau" class="table table-bordered">
                <thead>
                  <th>Emission</th>
                  <th>Status</th>
                  <th><span class='pull-left'><a href='#voir_programme' class='programme' data-toggle='modal' data-id=''><i class='fa fa-eye'></i></a></span></th>
                  <th>Presentateur</th>
                  <th>Date Ajout</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT CodeEmission,DesignationEmission,t_emission.Status as Status, t_emission.Created_on, NomPresentateur,PostnomPresentateur FROM t_emission INNER JOIN t_presentateur On t_emission.CodePresentateur=t_presentateur.IdPresentateur");
                      $stmt->execute();
                      foreach($stmt as $emission){
                        
                        $status = ($emission['Status']) ? '<span class="label label-success">active</span>' : '<span class="label label-danger">non active</span>';
                        $active = (!$emission['Status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="'.$emission['CodeEmission'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
                        if($emission['Status'] == 1)
                        {
                        echo "
                          <tr>
                            <td>".$emission['DesignationEmission']."</td>
                            <td>
                              ".$status."
                              ".$active."
                            </td>
                            <td><span class='pull-left'><a href='#voir_programme' class='programme' data-toggle='modal' data-id='".$emission['CodeEmission']."'><i class='fa fa-eye'></i></a></span></td>
                            <td>".$emission['NomPresentateur'].' '.$emission['PostnomPresentateur']."</td>
                            <td>".date('M d, Y', strtotime($emission['Created_on']))."</td>
                            
                            <td>
                            
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$emission['CodeEmission']."'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm desactivate btn-flat' data-id='".$emission['CodeEmission']."'><i class='fa fa-trash'></i> Desactiver</button>
                              <button class='btn btn-primary btn-sm program btn-flat' data-id='".$emission['CodeEmission']."'><i class='fa fa-edit'></i>Add program</button>
                            </td>
                          </tr>
                        ";
                        }else{
                            echo "
                          <tr>
                            <td>".$emission['DesignationEmission']."</td>
                            <td>
                              ".$status."
                              ".$active."
                            </td>
                            <td></td>
                            <td>".$emission['NomPresentateur'].' '.$emission['PostnomPresentateur']."</td>
                            <td>".date('M d, Y', strtotime($emission['Created_on']))."</td>
                            
                            <td>
                            <button class='btn btn-primary btn-sm desactivate btn-flat' data-id='' disabled><i class='fa fa-trash'></i> Activer d'abord l'emission</button>
                            </td>
                          </tr>
                        ";
                        }
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

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'modal/emission.php'; ?>
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

  $(document).on('click', '.status', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.desactivate', function(e){
    e.preventDefault();
    $('#desactivate').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.program', function(e){
    e.preventDefault();
    $('#program').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.programme', function(e){
    e.preventDefault();
    $('#voir_programme').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/emission_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.emission').val(response.CodeEmission);
      $('#edit_designation').val(response.DesignationEmission);
      }
  });
}
</script>
</body>
</html>
