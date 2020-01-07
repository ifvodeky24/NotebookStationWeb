<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PesananKhusus */

$this->title = $model->id_pesanan_khusus;
$this->params['breadcrumbs'][] = ['label' => 'Pesanan Khususes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pesanan-khusus-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id_pesanan_khusus], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_pesanan_khusus], [
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
            'id_pesanan_khusus',
            'kode_pesanan',
            'nama_lengkap',
            'email',
            'nomor_hp',
            [
                'label'=>'Nama Produk ',
                'format'=>'raw',
                'value' => function($data){
                    $sql = (new \Yii\db\query())
                            ->select('*')
                            ->from('tb_pesanan_khusus')
                            ->leftjoin('tb_produk', 'tb_produk.id_produk = tb_pesanan_khusus.id_produk')
                            ->where(['id_pesanan_khusus' => $data['id_pesanan_khusus']])
                            ->one();
                    
                    return $sql['nama_produk'];
                }
            ],
            'tanggal_pesanan',
            'jumlah',
            'total_tagihan',
            'alamat_lengkap',
            'status',
            'latitude',
            'longitude',
            'catatan_opsional',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
