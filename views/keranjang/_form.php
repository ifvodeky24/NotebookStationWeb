<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Konsumen;
use app\models\Produk;

/* @var $this yii\web\View */
/* @var $model app\models\Keranjang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="keranjang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        $nama_konsumen = ArrayHelper::map(Konsumen::find()->all(),'id_konsumen','nama_lengkap');
        echo $form->field($model, 'id_konsumen')->dropDownList($nama_konsumen,['prompt'=>'Pilih Nama Konsumen...'])->label('Nama Konsumen');
    ?>

    <?php 
        $nama_produk = ArrayHelper::map(Produk::find()->all(),'id_produk','nama_produk');
        echo $form->field($model, 'id_produk')->dropDownList($nama_produk,['prompt'=>'Pilih Nama Produk...'])->label('Nama Produk');
    ?>

    <?= $form->field($model, 'status')->dropDownList(['Tersedia' => 'Tersedia', 'Tidak Tersedia' => 'Tidak Tersedia', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'jumlah')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
