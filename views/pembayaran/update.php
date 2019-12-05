<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pembayaran */

$this->title = 'Ubah Data Pembayaran: ' . $model->id_pembayaran;
$this->params['breadcrumbs'][] = ['label' => 'Data Master Pembayaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pembayaran, 'url' => ['view', 'id' => $model->id_pembayaran]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="pembayaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
