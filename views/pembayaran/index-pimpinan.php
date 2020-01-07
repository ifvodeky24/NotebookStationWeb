<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Data Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Print Laporan', ['/pembayaran/print-laporan'], ['class' => 'btn btn-warning']) ?>
    </p>


<div class="box">
    <div class="box-header">
        <b><center> <h3 class="box-title">Laporan Data Pembayaran</h3></center></b>
    </div>

<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th><center>No</center></th>
            <th><center>Id Pembayaran</center></th>
            <th><center>Id Pesanan</center></th>
            <th><center>Bukti Transfer</center></th>
            <th><center>Jumlah Transfer</center></th>
            <th><center>Status</center></th>
            <th><center>Aksi</center></th>
        </tr>
        </thead>

        <tbody>

        <?php
        $no=1;foreach($model as $db):

        ?>
           <td><center><?= $no; ?></center></td>    
           <td><center><?= $db['id_pembayaran']?></center></td>    
           <td><center><?= $db['id_pesanan']?></center></td>    
           <td><center><?= $db['bukti_transfer']?></center></td>    
           <td><center><?= $db['jumlah_transfer']?></center></td>    
           <td><center><?= $db['status']?></center></td>      

           <td> <center>
                <?= Html::a('<i class="fa fa-search"></i>', ['/pembayaran/view', 'id' =>$db['id_pembayaran']], ['class' => 'btn btn-warning btn-xs']) ?>
                

             </center></td>
          </tr>

            <?php $no++;endforeach; ?>

          </tbody>
        </table>           
       </div>         
     </div>               

</div>
