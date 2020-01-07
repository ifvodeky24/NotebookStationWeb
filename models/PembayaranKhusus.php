<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pembayaran_khusus".
 *
 * @property int $id_pembayaran_khusus
 * @property int $id_pesanan_khusus
 * @property string $bukti_transfer
 * @property int $jumlah_transfer
 * @property string $status
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property TbPesananKhusus $pesananKhusus
 */
class PembayaranKhusus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_pembayaran_khusus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pesanan_khusus', 'bukti_transfer', 'jumlah_transfer', 'status'], 'required'],
            [['id_pesanan_khusus', 'jumlah_transfer'], 'integer'],
            [['status'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['bukti_transfer'], 'string', 'max' => 50],
            [['id_pesanan_khusus'], 'exist', 'skipOnError' => true, 'targetClass' => PesananKhusus::className(), 'targetAttribute' => ['id_pesanan_khusus' => 'id_pesanan_khusus']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pembayaran_khusus' => 'Id Pembayaran Khusus',
            'id_pesanan_khusus' => 'Id Pesanan Khusus',
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
    public function getPesananKhusus()
    {
        return $this->hasOne(PesananKhusus::className(), ['id_pesanan_khusus' => 'id_pesanan_khusus']);
    }
}
