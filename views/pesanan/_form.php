<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Konsumen;

/* @var $this yii\web\View */
/* @var $model app\models\Pesanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    	$nama_lengkap = ArrayHelper::map(Konsumen::find() ->all(),'id_konsumen', 'nama_lengkap');
    	echo $form->field($model, 'id_konsumen')->dropDownList($nama_lengkap, ['prompt'=>'Pilih Nama Konsumen....'])->label('Nama Konsumen');
    ?>

    <?= $form->field($model, 'tanggal_pesanan')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'status')
             ->dropDownList([ 
                'Menunggu Konfirmasi' => 'Menunggu Konfirmasi', 
                'Menunggu Pembayaran' => 'Menunggu Pembayaran',
                'Sedang Dikirim' => 'Sedang Dikirim', 
                'Sampai Tujuan' => 'Sampai Tujuan', 
                'Selesai' => 'Selesai', 
                'Batal' => 'Batal', 
                    ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
