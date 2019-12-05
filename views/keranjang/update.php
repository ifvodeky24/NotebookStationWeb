<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Keranjang */

$this->title = 'Ubah Data Keranjang: ' . $model->id_keranjang;
$this->params['breadcrumbs'][] = ['label' => 'Data Master Keranjang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_keranjang, 'url' => ['view', 'id' => $model->id_keranjang]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="keranjang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
