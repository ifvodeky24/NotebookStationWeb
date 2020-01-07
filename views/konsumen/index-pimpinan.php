<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KonsumenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Data Konsumen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konsumen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Print Laporan', ['/konsumen/print-laporan'], ['class' => 'btn btn-warning']) ?>
    </p>

    <div class="box">
    <div class="box-header">
        <b><center> <h3 class="box-title">Laporan Data Konsumen</h3></center></b>
    </div>

<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th><center>No</center></th>
            <th><center>Id Konsumen</center></th>
            <th><center>Username</center></th>
            <th><center>Nama Lengkap</center></th>
            <th><center>Email</center></th>
            <th><center>Password</center></th>
            <th><center>Nomor Hp</center></th>
            <th><center>Alamat</center></th>
            <th><center>Foto</center></th>
            <th><center>Aksi</center></th>
        </tr>
        </thead>

        <tbody>

        <?php
        $no=1;foreach($model as $db):

        ?>
           <td><center><?= $no; ?></center></td>    
           <td><center><?= $db['id_konsumen']?></center></td>    
           <td><center><?= $db['username']?></center></td>    
           <td><center><?= $db['nama_lengkap']?></center></td>    
           <td><center><?= $db['email']?></center></td>    
           <td><center><?= $db['password']?></center></td>    
           <td><center><?= $db['nomor_hp']?></center></td>    
           <td><center><?= $db['alamat']?></center></td>    
           <td><center> <a href="<?= Yii::getAlias('@web') .'/files/images/konsumen_images/'. $db['foto']; ?>" target="_blank"><img class="img-circle" height="100" width="100" src="<?= Yii::getAlias('@web') .'/files/images/konsumen_images/'. $db['foto']; ?>"> </center> </td>


           <td> <center>
                <?= Html::a('<i class="fa fa-search"></i>', ['/konsumen/view-pimpinan', 'id' =>$db['id_konsumen']], ['class' => 'btn btn-warning btn-xs']) ?>
              
             </center></td>
          </tr>

            <?php $no++;endforeach; ?>

          </tbody>
        </table>           
       </div>         
     </div>               
</div>
