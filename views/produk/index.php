<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProdukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Master Produk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesanan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Data Produk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
    <div class="box-header">
        <b><center> <h3 class="box-title">Data Master Produk</h3></center></b>
    </div>

<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th><center>No</center></th>
            <th><center>Id Produk</center></th>
            <th><center>Id User</center></th>
            <th><center>Nama Produk</center></th>
            <th><center>Merk Produk</center></th>
            <th><center>Harga</center></th>
            <th><center>Deskripsi</center></th>
            <th><center>Foto 1</center></th>
            <th><center>Aksi</center></th>
        </tr>
        </thead>

        <tbody>

        <?php
        $no=1;foreach($model as $db):

        ?>
           <td><center><?= $no; ?></center></td>    
           <td><center><?= $db['id_produk']?></center></td>    
           <td><center><?= $db['id_user']?></center></td>    
           <td><center><?= $db['nama_produk']?></center></td>    
           <td><center><?= $db['merk_produk']?></center></td>    
           <td><center><?= $db['harga']?></center></td>      
           <td><center><?= $db['deskripsi']?></center></td>      
           <td><center> <a href="<?= Yii::getAlias('@web') .'/files/images/produk_images/'. $db['foto_1']; ?>" target="_blank"><img class="img-circle" height="100" width="100" src="<?= Yii::getAlias('@web') .'/files/images/produk_images/'. $db['foto_1']; ?>"> </center> </td>      

           <td> <center>
               <?= Html::a('<i class="fa fa-search"></i>', ['/produk/view', 'id' =>$db['id_produk']], ['class' => 'btn btn-warning btn-xs']) ?>
                <?= Html::a('<i class="fa fa-pencil"></i>', ['/produk/update', 'id' =>$db['id_produk']], ['class' => 'btn btn-info btn-xs']) ?>
                <?= Html::a('<i class="fa fa-trash"></i>', ['/produk/delete', 'id' =>$db['id_produk']], [
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

