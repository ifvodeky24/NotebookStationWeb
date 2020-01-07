<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */

$this->title = $model->nama_produk;
$this->params['breadcrumbs'][] = ['label' => 'Data Master Produk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produk-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id_produk], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_produk], [
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
            'id_produk',
            'nama_produk',
            'merk_produk',
            'harga',
            'deskripsi',
            'kondisi',
            'stok',
            [
                'label'=>'foto 1',
                'format'=>'raw',
                'value' => function($data){
                    $url = Yii::$app->getHomeUrl(). "/files/images/produk_images/" .$data['foto_1'];

                    return Html::img($url, ['alt'=>'Gambar Tidak Ada', 'class'=>'img-circle user-img',
                        'height'=>'100', 'width'=>'100', 'style'=>'object-fit: cover']);
                }
            ],

            [
                'label'=>'foto 2',
                'format'=>'raw',
                'value' => function($data){
                    $url = Yii::$app->getHomeUrl(). "/files/images/produk_images/" .$data['foto_2'];

                    return Html::img($url, ['alt'=>'Gambar Tidak Ada', 'class'=>'img-circle user-img',
                        'height'=>'100', 'width'=>'100', 'style'=>'object-fit: cover']);
                }
            ],

            [
                'label'=>'foto 3',
                'format'=>'raw',
                'value' => function($data){
                    $url = Yii::$app->getHomeUrl(). "/files/images/produk_images/" .$data['foto_3'];

                    return Html::img($url, ['alt'=>'Gambar Tidak Ada', 'class'=>'img-circle user-img',
                        'height'=>'100', 'width'=>'100', 'style'=>'object-fit: cover']);
                }
            ],

            [
                'label'=>'foto 4',
                'format'=>'raw',
                'value' => function($data){
                    $url = Yii::$app->getHomeUrl(). "/files/images/produk_images/" .$data['foto_4'];

                    return Html::img($url, ['alt'=>'Gambar Tidak Ada', 'class'=>'img-circle user-img',
                        'height'=>'100', 'width'=>'100', 'style'=>'object-fit: cover']);
                }
            ],
            [
                'label'=>'Nama Pemilik ',
                'format'=>'raw',
                'value' => function($data){
                    $sql = (new \Yii\db\query())
                            ->select('*')
                            ->from('tb_user')
                            ->where(['id_user' => $data['id_user']])
                            ->one();
                    
                    return $sql['nama_lengkap'];
                }
            ],
            'user.nama_toko',
            [
                'label'=>'Logo Toko',
                'format'=>'raw',
                'value' => function($data){
                    $sql = (new \Yii\db\query())
                            ->select('*')
                            ->from('tb_user')
                            ->where(['id_user' => $data['id_user']])
                            ->one();

                    $url = Yii::$app->getHomeUrl(). "/files/images/toko_images/" .$sql['logo_toko'];

                    return Html::img($url, ['alt'=>'Gambar Tidak Ada', 'class'=>'img-circle user-img',
                        'height'=>'100', 'width'=>'100', 'style'=>'object-fit: cover']);
                }
            ],
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
