<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Konsumen */

$this->title = $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Data Master Konsumen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="konsumen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id_konsumen], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_konsumen], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus item ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_konsumen',
            'username',
            'nama_lengkap',
            'email:email',
            'password',
            'nomor_hp',
            'alamat',
            [
                'label'=>'foto ',
                'format'=>'raw',
                'value' => function($data){
                    $url = Yii::$app->getHomeUrl(). "/files/images/konsumen_images/" .$data['foto'];

                    return Html::img($url, ['alt'=>'Gambar Tidak Ada', 'class'=>'img-circle user-img',
                        'height'=>'100', 'width'=>'100', 'style'=>'object-fit: cover']);
                }
            ],
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
