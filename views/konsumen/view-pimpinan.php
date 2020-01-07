<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Konsumen */

$this->title = $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Laporan Data Konsumen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="konsumen-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_konsumen',
            'username',
            'nama_lengkap',
            'email:email',
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
