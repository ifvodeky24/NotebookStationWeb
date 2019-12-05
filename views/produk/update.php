<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */

$this->title = 'Ubah Data Produk: ' . $model->nama_produk;
$this->params['breadcrumbs'][] = ['label' => 'Data Master Produk', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_produk, 'url' => ['view', 'id' => $model->id_produk]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="produk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
