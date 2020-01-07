<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PembayaranKhusus */

$this->title = $model->id_pembayaran_khusus;
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Khusus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pembayaran-khusus-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id_pembayaran_khusus], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_pembayaran_khusus], [
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
            'id_pembayaran_khusus',
            'id_pesanan_khusus',
            'bukti_transfer',
            'jumlah_transfer',
            'status',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
