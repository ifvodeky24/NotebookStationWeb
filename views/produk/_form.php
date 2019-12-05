<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-form">

    <?php $form = ActiveForm::begin([ 'options' => ['enctype' =>'multipart/form-data']]) ?>

    <?= $form->field($model, 'nama_produk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'merk_produk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kondisi')->dropDownList([ 'Baru' => 'Baru', 'Bekas' => 'Bekas', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'stok')->textInput() ?>

    <?= $form->field($model, 'foto_1')->fileInput() ?>

    <?= $form->field($model, 'foto_2')->fileInput() ?>

    <?= $form->field($model, 'foto_3')->fileInput() ?>

    <?= $form->field($model, 'foto_4')->fileInput() ?>

    <?php $id_user = Yii::$app->user->identity['id_user']; ?>

    <?= $form->field($model, 'id_user')->hiddenInput(['value'=> $id_user])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
