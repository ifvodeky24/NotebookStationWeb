<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProdukSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_produk') ?>

    <?= $form->field($model, 'nama_produk') ?>

    <?= $form->field($model, 'merk_produk') ?>

    <?= $form->field($model, 'harga') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'kondisi') ?>

    <?php // echo $form->field($model, 'stok') ?>

    <?php // echo $form->field($model, 'foto_1') ?>

    <?php // echo $form->field($model, 'foto_2') ?>

    <?php // echo $form->field($model, 'foto_3') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
