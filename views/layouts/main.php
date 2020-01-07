<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

AppAsset::register($this);

$nama_lengkap=Yii::$app->user->identity->nama_lengkap;
$level=Yii::$app->user->identity->level;
$id_user=Yii::$app->user->identity->id_user;
$foto=Yii::$app->user->identity->foto;
User::find()
->where(['id_user' => $id_user])
->one();

?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php $this->registerCsrfMetaTags() ?>
    <title>SENAPELAN COMPUTER</title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<?php $this->beginBody() ?>


<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= Yii::$app->request->baseUrl; ?>/site" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Senapelan Computer</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
                <?= empty($user->foto) ?
                  Html::img('@web/files/images/user_images/'.$foto, ['class' => 'user-image img-circle', 'alt' => 'User Image']) :

                  Html::img(\Yii::$app->params['frontendUrl'] . $user->foto, ['class' => 'user-image img-circle', 'alt' => 'User Image' ]) ?>


              <span class="hidden-xs"><?php echo $nama_lengkap; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               
               <?= empty($user->foto) ?
                  Html::img('@web/files/images/user_images/'.$foto, ['class' => 'img-circle', 'alt' => 'User Image']) :

                  Html::img(\Yii::$app->params['frontendUrl'] . $user->foto, ['class' => 'img-circle', 'alt' => 'User Image' ]) ?>


                <p>
                   <?php echo $nama_lengkap ?>
                  <small>Selamat Datang <?php echo $nama_lengkap?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php echo Html::a('Profil', ['/user/profil'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']) ?>
                  <!-- <a href="" class="btn btn-default btn-flat">Profil</a> -->
                </div>
                <div class="pull-right">
                 <?php echo Html::a('Logout', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']) ?>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <br>
      <div class="user-panel">
        <div class="pull-left image">
           <?= empty($user->foto) ?
                  Html::img('@web/files/images/user_images/'.$foto, ['class' => 'user-image img-circle', 'alt' => 'User Image', 'style' => 'width:60px;height: 60px']) :

                  Html::img(\Yii::$app->params['frontendUrl'] . $user->foto, ['class' => 'user-image img-circle', 'alt' => 'User Image', 'style' => 'width:60px;height: 60px' ]) ?>

          
        </div>
        <div class="pull-left info">
        <p> <?php echo $nama_lengkap ?></p>
        <p> <small> <?php echo $level ?></small></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <br>
        <li class="header">MAIN NAVIGATION</li>
        <!--  data Branda Awal-->
        <br>
         <li>
          <a href="<?php echo Yii::$app->request->baseUrl; ?>/site">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
        <!-- data Branda Akhir -->

        <?php if(($level== 'Admin')):?>

        <!-- data master produk awal -->
        <li>
          <a href="<?php echo Yii::$app->request->baseUrl; ?>/produk/index">
            <i class="fa  fa-folder-open-o"></i> <span>Data Master Produk</span>
          </a>
        </li>
        <!-- data master produk akhir -->

         <!-- data master konsumen awal -->
        <li>
          <a href="<?php echo Yii::$app->request->baseUrl; ?>/konsumen/index">
            <i class="fa fa-users"></i> <span>Data Master Konsumen</span>
          </a>
        </li>
        <!-- data master konsumen akhir -->

        <!-- data master pesanan awal -->
        <li>
          <a href="<?php echo Yii::$app->request->baseUrl; ?>/pesanan/index">
            <i class="fa fa-users"></i> <span>Data Master Pesanan</span>
          </a>
        </li>
        <!-- data master pesanan akhir -->

        <!-- data master pesanan awal -->
        <li>
          <a href="<?php echo Yii::$app->request->baseUrl; ?>/pesanan-khusus/index">
            <i class="fa fa-users"></i> <span>Data Master Pesanan Khusus</span>
          </a>
        </li>
        <!-- data master pesanan akhir -->

        <!-- data master keranjang awal -->
        <li>
          <a href="<?php echo Yii::$app->request->baseUrl; ?>/keranjang/index">
            <i class="fa fa-users"></i> <span>Data Master Keranjang</span>
          </a>
        </li>
        <!-- data master keranjang akhir -->

        <!-- data master pembayaran awal -->
        <li>
          <a href="<?php echo Yii::$app->request->baseUrl; ?>/pembayaran/index">
            <i class="fa  fa-money "></i> <span>Data Master Pembayaran</span>
          </a>
        </li>
        <!-- data master pembayaran akhir -->

        <!-- data master pembayaran awal -->
        <li>
          <a href="<?php echo Yii::$app->request->baseUrl; ?>/pembayaran-khusus/index">
            <i class="fa  fa-money "></i> <span>Data Master Pembayaran Khusus</span>
          </a>
        </li>
        <!-- data master pembayaran akhir -->

        <!-- data master wishlist awal -->
        <li>
          <a href="<?php echo Yii::$app->request->baseUrl; ?>/wishlist/index">
            <i class="fa  fa-heart "></i> <span>Data Master Wishlist</span>
          </a>
        </li>
        <!-- data master wishlist akhir -->

        <!-- data master user awal -->
        <li>
          <a href="<?php echo Yii::$app->request->baseUrl; ?>/user/index">
            <i class="fa  fa-male "></i> <span>Data Master User</span>
          </a>
        </li>
        <!-- data master user akhir -->

        <?php endif;?>

        <?php if(($level== 'Pimpinan')):?>

        <li>
          <a href="<?php echo Yii::$app->request->baseUrl; ?>/produk/index-pimpinan">
            <i class="fa  fa-folder-open-o"></i> <span>Laporan Data Produk</span>
          </a>
        </li>

        <li>
          <a href="<?php echo Yii::$app->request->baseUrl; ?>/konsumen/index-pimpinan">
            <i class="fa  fa-folder-open-o"></i> <span>Laporan Data Konsumen</span>
          </a>
        </li>

        <li>
          <a href="<?php echo Yii::$app->request->baseUrl; ?>/pesanan/index-pimpinan">
            <i class="fa  fa-folder-open-o"></i> <span>Laporan Data Pesanan</span>
          </a>
        </li>

        <li>
          <a href="<?php echo Yii::$app->request->baseUrl; ?>/pembayaran/index-pimpinan">
            <i class="fa  fa-folder-open-o"></i> <span>Laporan Data Pembayaran</span>
          </a>
        </li>

        <?php endif;?>

      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Control panel
        <small>NOTEBOOKSTATION</small>
      </h1>

      <ol class="breadcrumb">
       <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="right_col" role="main">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="clearfix"></div>
                        <div class="x_content">
                            <?php echo $content; ?>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y') ?> <a href="https://adminlte.io">PT.Kunango Jantan</a>.</strong>
  </footer>

  <div class="control-sidebar-bg"></div>
</div>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>