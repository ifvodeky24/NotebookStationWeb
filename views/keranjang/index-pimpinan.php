<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KeranjangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Master Keranjang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keranjang-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Data Keranjang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<div class="box">
    <div class="box-header">
        <b><center> <h3 class="box-title">Data Master Keranjang</h3></center></b>
    </div>

<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th><center>No</center></th>
            <th><center>Id Keranjang</center></th>
            <th><center>Id Konsumen</center></th>
            <th><center>Id Produk</center></th>
            <th><center>Status</center></th>
            <th><center>Jumlah</center></th>
            <th><center>Aksi</center></th>
        </tr>
        </thead>

        <tbody>

        <?php
        $no=1;foreach($model as $db):

        ?>
           <td><center><?= $no; ?></center></td>    
           <td><center><?= $db['id_keranjang']?></center></td>    
           <td><center><?= $db['id_konsumen']?></center></td>      
           <td><center><?= $db['id_produk']?></center></td>      
           <td><center><?= $db['status']?></center></td>      
           <td><center><?= $db['jumlah']?></center></td>      

           <td> <center>
                <?= Html::a('<i class="fa fa-search"></i>', ['/keranjang/view', 'id' =>$db['id_keranjang']], ['class' => 'btn btn-warning btn-xs']) ?>
                <?= Html::a('<i class="fa fa-pencil"></i>', ['/keranjang/update', 'id' =>$db['id_keranjang']], ['class' => 'btn btn-info btn-xs']) ?>
                <?= Html::a('<i class="fa fa-trash"></i>', ['/keranjang/delete', 'id' =>$db['id_keranjang']], [
                    'class' => 'btn btn-danger btn-xs',
                    'data' => [
                    'confirm' => 'anda yakin ingin menghapus "'.$db['id_keranjang']. '"?',
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
