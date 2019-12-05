<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetailKeranjang */

$this->title = 'Update Detail Keranjang: ' . $model->id_detail_keranjang;
$this->params['breadcrumbs'][] = ['label' => 'Detail Keranjangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detail_keranjang, 'url' => ['view', 'id' => $model->id_detail_keranjang]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-keranjang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
