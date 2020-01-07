<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pesanan */

$this->title = 'Tambah Data Pesanan';
$this->params['breadcrumbs'][] = ['label' => 'Data Master Pesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
