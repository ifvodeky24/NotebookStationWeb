<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PesananKhusus;

/* @var $this yii\web\View */
/* @var $model app\models\PembayaranKhusus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembayaran-khusus-form">

    <?php $form = ActiveForm::begin([ 'options' => ['enctype' =>'multipart/form-data']]) ?>

    <?php 
        $id_pesanan_khusus = ArrayHelper::map(PesananKhusus::find()->all(),'id_pesanan_khusus','id_pesanan_khusus');
        echo $form->field($model, 'id_pesanan_khusus')->dropDownList($id_pesanan_khusus,['prompt'=>'Pilih Id Pesanan Khusus...']);
    ?>

    <?= $form->field($model, 'bukti_transfer')->fileInput() ?>

    <?= $form->field($model, 'jumlah_transfer')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Lunas' => 'Lunas', 'Belum Lunas' => 'Belum Lunas', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
