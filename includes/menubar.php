<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['Photo'])) ? 'img/'.$user['Photo'] : 'img/user.png'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php //echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Enline</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">RAPPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="presentateur.php"><i class="fa fa-user"></i> <span>Presentateur</span></a></li>
      <li><a href="emission.php"><i class="fa fa-sellsy"></i> <span>Emission</span></a></li>
      <li><a href="paiement.php"><i class="fa fa-money"></i> <span>Paiement</span></a></li>
      <li><a href="redaction.php"><i class="fa fa-edit"></i> <span>Rédaction</span></a></li>
      <li><a href="publicite.php"><i class="fa fa-television"></i> <span>Publicite</span></a></li>
      <li class="header">GESTION</li>
      <li><a href="#.php"><i class="fa fa-users"></i> <span>Utilisateur</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-home"></i>
          <span>Société</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="societe.php"><i class="fa fa-circle-o"></i> Nos societes</a></li>
          <li><a href="categorie_societe.php"><i class="fa fa-circle-o"></i> Catégories</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
          <span>Prévisions</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="prevision_publicite.php"><i class="fa fa-circle-o"></i> Prev. Publicite</a></li>
          <li><a href="prevision_emission.php"><i class="fa fa-circle-o"></i> Prev. Rédaction/Emission</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
