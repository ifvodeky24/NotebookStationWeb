<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pembayaran */

$this->title = 'Tambah Data Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Data Master Pembayaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
