<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\DetailKeranjang;

/* @var $this yii\web\View */
/* @var $model app\models\Keranjang */

$this->title = $model->id_keranjang;
$this->params['breadcrumbs'][] = ['label' => 'Data Master Keranjang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="keranjang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id_keranjang], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_keranjang], [
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
            'id_keranjang',
            'id_konsumen',
            'status',
            [
                'label'=>'Id Produk ',
                'format'=>'raw',
                'value' => function($data){
                    $sql = (new \Yii\db\query())
                            ->select('id_produk')
                            ->from('tb_detail_keranjang')
                            ->where(['id_keranjang' => $data['id_keranjang']])
                            ->one();
                    
                    return $sql['id_produk'];
                }
            ],
            [
                'label'=>'Jumlah ',
                'format'=>'raw',
                'value' => function($data){
                    $sql = (new \Yii\db\query())
                            ->select('jumlah')
                            ->from('tb_detail_keranjang')
                            ->where(['id_keranjang' => $data['id_keranjang']])
                            ->one();
                    
                    return $sql['jumlah'];
                }
            ],
            'createdAt',
            'updatedAt',
        
        ],
    ]) ?>

</div>
