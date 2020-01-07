<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\DetailKeranjang;

/* @var $this yii\web\View */
/* @var $model app\models\Keranjang */

$this->title = $model->id_keranjang;
$this->params['breadcrumbs'][] = ['label' => 'Data Master Keranjang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="keranjang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id_keranjang], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_keranjang], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus item ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_keranjang',
            'konsumen.nama_lengkap',
            'status',
            [
                'label'=>'Nama Produk ',
                'format'=>'raw',
                'value' => function($data){
                    $sql = (new \Yii\db\query())
                            ->select('*')
                            ->from('tb_detail_keranjang')
                            ->leftjoin('tb_produk', 'tb_produk.id_produk = tb_detail_keranjang.id_produk')
                            ->where(['id_keranjang' => $data['id_keranjang']])
                            ->one();
                    
                    return $sql['nama_produk'];
                }
            ],
            [
                'label'=>'Jumlah ',
                'format'=>'raw',
                'value' => function($data){
                    $sql = (new \Yii\db\query())
                            ->select('*')
                            ->from('tb_detail_keranjang')
                            ->where(['id_keranjang' => $data['id_keranjang']])
                            ->one();
                    
                    return $sql['jumlah'];
                }
            ],
            'jumlah_harga',
            'catatan_opsional',
            'createdAt',
            'updatedAt',
        
        ],
    ]) ?>

</div>
