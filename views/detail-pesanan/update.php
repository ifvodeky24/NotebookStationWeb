<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetailPesanan */

$this->title = 'Update Detail Pesanan: ' . $model->id_detail_pesanan;
$this->params['breadcrumbs'][] = ['label' => 'Detail Pesanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detail_pesanan, 'url' => ['view', 'id' => $model->id_detail_pesanan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-pesanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
