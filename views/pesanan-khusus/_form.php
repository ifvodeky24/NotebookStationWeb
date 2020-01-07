<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Produk;

/* @var $this yii\web\View */
/* @var $model app\models\PesananKhusus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesanan-khusus-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_pesanan')->textInput(['maxlength' => true]) ?>

    <?php 
        $nama_produk = ArrayHelper::map(Produk::find()->all(),'id_produk','nama_produk');
        echo $form->field($model, 'id_produk')->dropDownList($nama_produk,['prompt'=>'Pilih Nama Produk...'])->label('Nama Produk');
    ?>

    <?= $form->field($model, 'nama_lengkap')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'nomor_hp')->textInput() ?>

    <?= $form->field($model, 'tanggal_pesanan')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'total_tagihan')->textInput() ?>

    <?= $form->field($model, 'alamat_lengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Menunggu Pembayaran' => 'Menunggu Pembayaran', 'Menunggu Konfirmasi' => 'Menunggu Konfirmasi', 'Pesanan Diproses' => 'Pesanan Diproses', 'Sedang Dikirim' => 'Sedang Dikirim', 'Sampai Tujuan' => 'Sampai Tujuan', 'Selesai' => 'Selesai', 'Batal' => 'Batal', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'latitude')->textInput() ?>

    <?= $form->field($model, 'longitude')->textInput() ?>

    <?= $form->field($model, 'catatan_opsional')->textInput(['maxlength' => true]) ?>

   

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
