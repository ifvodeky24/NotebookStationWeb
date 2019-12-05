<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wishlist */

$this->title = 'Ubah Data Wishlist: ' . $model->id_wishlist;
$this->params['breadcrumbs'][] = ['label' => 'Data Master Wishlist', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_wishlist, 'url' => ['view', 'id' => $model->id_wishlist]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="wishlist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
