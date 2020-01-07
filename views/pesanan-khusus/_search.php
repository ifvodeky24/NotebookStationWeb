<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PesananKhususSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesanan-khusus-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pesanan_khusus') ?>

    <?= $form->field($model, 'kode_pesanan') ?>

    <?= $form->field($model, 'id_produk') ?>

    <?= $form->field($model, 'tanggal_pesanan') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?php // echo $form->field($model, 'total_tagihan') ?>

    <?php // echo $form->field($model, 'alamat_lengkap') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'catatan_opsional') ?>

    <?php // echo $form->field($model, 'createdAt') ?>

    <?php // echo $form->field($model, 'updatedAt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
