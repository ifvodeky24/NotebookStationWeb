<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pesanan */

$this->title = 'Ubah Data Pesanan: ' . $model->id_pesanan;
$this->params['breadcrumbs'][] = ['label' => 'Pesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pesanan, 'url' => ['view', 'id' => $model->id_pesanan]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="pesanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
