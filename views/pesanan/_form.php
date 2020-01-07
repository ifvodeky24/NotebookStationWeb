<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Konsumen;
use app\models\Produk;

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

    <?= $form->field($model, 'kode_pesanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_pesanan')->textInput(['type' => 'date']) ?>

     <?php 
        $nama_produk = ArrayHelper::map(Produk::find()->all(),'id_produk','nama_produk');
        echo $form->field($model, 'id_produk')->dropDownList($nama_produk,['prompt'=>'Pilih Nama Produk...'])->label('Nama Produk');
    ?>

    <?= $form->field($model, 'jumlah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_tagihan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'catatan_opsional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_lengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')
             ->dropDownList([ 
                'Menunggu Pembayaran' => 'Menunggu Pembayaran',
                'Menunggu Konfirmasi' => 'Menunggu Konfirmasi', 
                'Pesanan Diproses' => 'Pesanan Diproses', 
                'Sedang Dikirim' => 'Sedang Dikirim', 
                'Sampai Tujuan' => 'Sampai Tujuan', 
                'Selesai' => 'Selesai', 
                'Batal' => 'Batal', 
                    ], ['prompt' => 'Pilih Status...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
