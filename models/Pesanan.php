<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pesanan".
 *
 * @property int $id_pesanan
 * @property int $id_konsumen
 * @property string $tanggal_pesanan
 * @property string $status
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property DetailPesanan[] $DetailPesanan
 * @property Konsumen $konsumen
 */
class Pesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_pesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_konsumen', 'status'], 'required'],
            [['id_konsumen'], 'integer'],
            [['tanggal_pesanan', 'createdAt', 'updatedAt'], 'safe'],
            [['status'], 'string'],
            [['id_konsumen'], 'exist', 'skipOnError' => true, 'targetClass' => Konsumen::className(), 'targetAttribute' => ['id_konsumen' => 'id_konsumen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pesanan' => 'Id Pesanan',
            'id_konsumen' => 'Id Konsumen',
            'tanggal_pesanan' => 'Tanggal Pesanan',
            'status' => 'Status',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPesanan()
    {
        return $this->hasMany(DetailPesanan::className(), ['id_pesanan' => 'id_pesanan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKonsumen()
    {
        return $this->hasOne(Konsumen::className(), ['id_konsumen' => 'id_konsumen']);
    }
}
