<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pembayaran".
 *
 * @property int $id_pembayaran
 * @property int $id_pesanan
 * @property string $bukti_transfer
 * @property int $jumlah_transfer
 * @property string $status
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Pesanan $pesanan
 */
class Pembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pesanan', 'bukti_transfer', 'jumlah_transfer', 'status'], 'required'],
            [['id_pesanan', 'jumlah_transfer'], 'integer'],
            [['status'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['bukti_transfer'], 'string', 'max' => 50],
            [['id_pesanan'], 'exist', 'skipOnError' => true, 'targetClass' => Pesanan::className(), 'targetAttribute' => ['id_pesanan' => 'id_pesanan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pembayaran' => 'Id Pembayaran',
            'id_pesanan' => 'Id Pesanan',
            'bukti_transfer' => 'Bukti Transfer',
            'jumlah_transfer' => 'Jumlah Transfer',
            'status' => 'Status',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesanan()
    {
        return $this->hasOne(Pesanan::className(), ['id_pesanan' => 'id_pesanan']);
    }
}
