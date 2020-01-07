<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PesananKhusus */

$this->title = 'Ubah Data Pesanan Khusus: ' . $model->id_pesanan_khusus;
$this->params['breadcrumbs'][] = ['label' => 'Pesanan Khusus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pesanan_khusus, 'url' => ['view', 'id' => $model->id_pesanan_khusus]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pesanan-khusus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
