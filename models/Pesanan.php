<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pesanan".
 *
 * @property int $id_pesanan
 * @property string $kode_pesanan
 * @property int $id_konsumen
 * @property string $tanggal_pesanan
 * @property string $status
 * @property string $catatan_opsional
 * @property string $alamat_lengkap
 * @property double $latitude
 * @property double $longitude
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property TbDetailPesanan[] $tbDetailPesanans
 * @property TbPembayaran[] $tbPembayarans
 * @property TbKonsumen $konsumen
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

    public $id_produk; 
    public $jumlah; 
    public $total_tagihan; 

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_pesanan', 'id_konsumen', 'status', 'catatan_opsional', 'alamat_lengkap', 'latitude', 'longitude'], 'required'],
            [['id_konsumen', 'id_produk', 'jumlah', 'total_tagihan'], 'integer'],
            [['tanggal_pesanan', 'createdAt', 'updatedAt'], 'safe'],
            [['status'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['kode_pesanan'], 'string', 'max' => 30],
            [['catatan_opsional', 'alamat_lengkap'], 'string', 'max' => 50],
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
            'kode_pesanan' => 'Kode Pesanan',
            'id_konsumen' => 'Id Konsumen',
            'tanggal_pesanan' => 'Tanggal Pesanan',
            'status' => 'Status',
            'catatan_opsional' => 'Catatan Opsional',
            'alamat_lengkap' => 'Alamat Lengkap',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPesanans()
    {
        return $this->hasMany(DetailPesanan::className(), ['id_pesanan' => 'id_pesanan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembayaran()
    {
        return $this->hasMany(Pembayaran::className(), ['id_pesanan' => 'id_pesanan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKonsumen()
    {
        return $this->hasOne(Konsumen::className(), ['id_konsumen' => 'id_konsumen']);
    }
}
