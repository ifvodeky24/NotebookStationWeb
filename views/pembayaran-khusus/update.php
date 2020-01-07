<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PembayaranKhusus */

$this->title = 'Ubah Data Pembayaran Khusus: ' . $model->id_pembayaran_khusus;
$this->params['breadcrumbs'][] = ['label' => 'Data Pembayaran Khusus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pembayaran_khusus, 'url' => ['view', 'id' => $model->id_pembayaran_khusus]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembayaran-khusus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
