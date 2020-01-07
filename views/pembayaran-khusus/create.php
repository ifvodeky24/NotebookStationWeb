<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PembayaranKhusus */

$this->title = 'Tambah Data Pembayaran Khusus';
$this->params['breadcrumbs'][] = ['label' => 'Data Pembayaran Khusus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-khusus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
