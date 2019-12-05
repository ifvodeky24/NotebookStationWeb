<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pesanan;

/* @var $this yii\web\View */
/* @var $model app\models\Pembayaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembayaran-form">

    <?php $form = ActiveForm::begin([ 'options' => ['enctype' =>'multipart/form-data']]) ?>

    <?php 
        $id_pesanan = ArrayHelper::map(Pesanan::find()->all(),'id_pesanan','id_pesanan');
        echo $form->field($model, 'id_pesanan')->dropDownList($id_pesanan,['prompt'=>'Pilih Id Pesanan...']);
    ?>

    <?= $form->field($model, 'bukti_transfer')->fileInput() ?>

    <?= $form->field($model, 'jumlah_transfer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Belum Lunas' => 'Belum Lunas', 'Lunas' => 'Lunas', ], ['prompt' => 'Status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
