<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_keranjang".
 *
 * @property int $id_keranjang
 * @property int $id_konsumen
 * @property string $status
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property DetailKeranjang[] $detailKeranjang
 * @property Konsumen $konsumen
 */
class Keranjang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_keranjang';
    }

    public $id_produk; 
    public $jumlah; 

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_konsumen', 'status'], 'required'],
            [['id_konsumen', 'jumlah', 'id_produk'], 'integer'],
            [['status'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['id_konsumen'], 'exist', 'skipOnError' => true, 'targetClass' => Konsumen::className(), 'targetAttribute' => ['id_konsumen' => 'id_konsumen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_keranjang' => 'Id Keranjang',
            'id_konsumen' => 'Id Konsumen',
            'status' => 'Status',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailKeranjang()
    {
        return $this->hasMany(DetailKeranjang::className(), ['id_keranjang' => 'id_keranjang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKonsumen()
    {
        return $this->hasOne(Konsumen::className(), ['id_konsumen' => 'id_konsumen']);
    }
}
