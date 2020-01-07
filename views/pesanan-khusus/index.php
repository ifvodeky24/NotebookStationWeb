<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesananKhususSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pesanan Khusus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesanan-khusus-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Data Pesanan Khusus', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<div class="box">
    <div class="box-header">
        <b><center> <h3 class="box-title">Data Pesanan</h3></center></b>
    </div>

<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th><center>No</center></th>
            <th><center>Id Pesanan Khusus</center></th>
            <th><center>Kode Pesanan</center></th>
            <th><center>Nama Produk</center></th>
            <th><center>Tanggal Pesanan</center></th>
            <th><center>Jumlah</center></th>
            <th><center>Total Tagihan</center></th>
            <th><center>Aksi</center></th>
          
        </tr>
        </thead>

        <tbody>

        <?php
        $no=1;foreach($model as $db):

        ?>
           <td><center><?= $no; ?></center></td>    
           <td><center><?= $db['id_pesanan_khusus']?></center></td>    
           <td><center><?= $db['kode_pesanan']?></center></td>    
           <td><center><?= $db['nama_produk']?></center></td>    
           <td><center><?= $db['tanggal_pesanan']?></center></td>    
           <td><center><?= $db['jumlah']?></center></td>    
           <td><center><?= $db['total_tagihan']?></center></td>    
          
           <td> <center>
                <?= Html::a('<i class="fa fa-search"></i>', ['/pesanan-khusus/view', 'id' =>$db['id_pesanan_khusus']], ['class' => 'btn btn-warning btn-xs']) ?>
                <?= Html::a('<i class="fa fa-pencil"></i>', ['/pesanan-khusus/update', 'id' =>$db['id_pesanan_khusus']], ['class' => 'btn btn-info btn-xs']) ?>
                <?= Html::a('<i class="fa fa-trash"></i>', ['/pesanan-khusus/delete', 'id' =>$db['id_pesanan_khusus']], [
                    'class' => 'btn btn-danger btn-xs',
                    'data' => [
                    'confirm' => 'anda yakin ingin menghapus "'.$db['nama_lengkap']. '"?',
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
