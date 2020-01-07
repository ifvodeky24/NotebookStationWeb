<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pesanan */

$this->title = $model->id_pesanan;
$this->params['breadcrumbs'][] = ['label' => 'Data Master Pesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pesanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id_pesanan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_pesanan], [
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
            'id_pesanan',
            'kode_pesanan',
            'konsumen.nama_lengkap',
            'tanggal_pesanan',
            'status',
            [
                'label'=>'Nama Produk ',
                'format'=>'raw',
                'value' => function($data){
                    $sql = (new \Yii\db\query())
                            ->select('*')
                            ->from('tb_detail_pesanan')
                            ->leftjoin('tb_produk', 'tb_produk.id_produk = tb_detail_pesanan.id_produk')
                            ->where(['id_pesanan' => $data['id_pesanan']])
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
                            ->from('tb_detail_pesanan')
                            ->where(['id_pesanan' => $data['id_pesanan']])
                            ->one();
                    
                    return $sql['jumlah'];
                }
            ],
            [
                'label'=>'Total Tagihan ',
                'format'=>'raw',
                'value' => function($data){
                    $sql = (new \Yii\db\query())
                            ->select('*')
                            ->from('tb_detail_pesanan')
                            ->where(['id_pesanan' => $data['id_pesanan']])
                            ->one();
                    
                    return $sql['total_tagihan'];
                }
            ],
            'catatan_opsional',
            'alamat_lengkap',
            'latitude',
            'longitude',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
