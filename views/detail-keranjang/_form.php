<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Keranjang;

/* @var $this yii\web\View */
/* @var $model app\models\DetailKeranjang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-keranjang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        $id_keranjang = ArrayHelper::map(Keranjang::find()->all(),'id_keranjang','id_keranjang');
        echo $form->field($model, 'id_keranjang')->dropDownList($id_keranjang,['prompt'=>'Pilih Keranjang...']);
    ?>

    <?= $form->field($model, 'id_keranjang')->textInput() ?>

    <?= $form->field($model, 'id_produk')->textInput() ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'createdAt')->textInput() ?>

    <?= $form->field($model, 'updatedAt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
