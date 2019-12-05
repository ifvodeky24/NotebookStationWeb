<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetailPesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Pesanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-pesanan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Data Detail Pesanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box">
    <div class="box-header">
        <b><center> <h3 class="box-title">Data Detail Pesanan</h3></center></b>
    </div>

<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th><center>No</center></th>
            <th><center>Id Detail Pesanan</center></th>
            <th><center>Id Pesanan</center></th>
            <th><center>Nama Produk</center></th>
            <th><center>Jumlah</center></th>
            <th><center>Aksi</center></th>
        </tr>
        </thead>

        <tbody>

        <?php
        $no=1;foreach($model as $db):

        ?>
           <td><center><?= $no; ?></center></td>    
           <td><center><?= $db['id_detail_pesanan']?></center></td>    
           <td><center><?= $db['id_pesanan']?></center></td>    
           <td><center><?= $db['nama_produk']?></center></td>    
           <td><center><?= $db['jumlah']?></center></td>        

           <td> <center>
              <?= Html::a('<i class="fa fa-search"></i>', ['/detail-pesanan/view', 'id' =>$db['id_detail_pesanan']], ['class' => 'btn btn-warning btn-xs']) ?>
                <?= Html::a('<i class="fa fa-pencil"></i>', ['/detail-pesanan/update', 'id' =>$db['id_detail_pesanan']], ['class' => 'btn btn-info btn-xs']) ?>
                <?= Html::a('<i class="fa fa-trash"></i>', ['/detail-pesanan/delete', 'id' =>$db['id_detail_pesanan']], [
                    'class' => 'btn btn-danger btn-xs',
                    'data' => [
                    'confirm' => 'anda yakin ingin menghapus "'.$db['nama_produk']. '"?',
                    'method' => 'post', 
                    ]
                    ]); ?>

             </center></td>
          </tr>

            <?php $no++;endforeach; ?>

          </tbody>
        </table>           
       </div>         
     </div>               


</div>
