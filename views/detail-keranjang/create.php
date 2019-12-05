<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetailKeranjang */

$this->title = 'Create Detail Keranjang';
$this->params['breadcrumbs'][] = ['label' => 'Detail Keranjangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-keranjang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
