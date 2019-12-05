<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Konsumen */

$this->title = 'Ubah Data Konsumen: ' . $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Data Master Konsumen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_lengkap, 'url' => ['view', 'id' => $model->id_konsumen]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="konsumen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
