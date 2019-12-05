<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetailPesanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-pesanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pesanan')->textInput() ?>

    <?= $form->field($model, 'id_produk')->textInput() ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
