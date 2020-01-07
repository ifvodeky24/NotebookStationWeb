<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PesananKhusus */

$this->title = 'Tambah Data Pesanan Khusus';
$this->params['breadcrumbs'][] = ['label' => 'Data Pesanan Khusus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesanan-khusus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
