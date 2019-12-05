<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Keranjang */

$this->title = 'Tambah Data Keranjang';
$this->params['breadcrumbs'][] = ['label' => 'Data Master Keranjang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keranjang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
