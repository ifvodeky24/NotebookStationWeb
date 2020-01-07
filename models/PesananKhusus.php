<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pesanan_khusus".
 *
 * @property int $id_pesanan_khusus
 * @property string $kode_pesanan
 * @property int $id_produk
 * @property string $tanggal_pesanan
 * @property int $jumlah
 * @property int $total_tagihan
 * @property string $alamat_lengkap
 * @property string $status
 * @property double $latitude
 * @property double $longitude
 * @property string $catatan_opsional
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property TbProduk $produk
 */
class PesananKhusus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_pesanan_khusus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_pesanan', 'id_produk', 'nama_lengkap','email','nomor_hp','jumlah', 'total_tagihan', 'alamat_lengkap', 'status', 'latitude', 'longitude', 'catatan_opsional'], 'required'],
            [['id_produk', 'jumlah', 'total_tagihan'], 'integer'],
            [['tanggal_pesanan', 'createdAt', 'updatedAt'], 'safe'],
            [['status'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['kode_pesanan'], 'string', 'max' => 30],
            [['alamat_lengkap', 'nama_lengkap','email','nomor_hp','catatan_opsional'], 'string', 'max' => 50],
            [['id_produk'], 'exist', 'skipOnError' => true, 'targetClass' => Produk::className(), 'targetAttribute' => ['id_produk' => 'id_produk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pesanan_khusus' => 'Id Pesanan Khusus',
            'kode_pesanan' => 'Kode Pesanan',
            'id_produk' => 'Id Produk',
            'nama_lengkap' => 'Nama Lengkap',
            'email' => 'Email',
            'nomor_hp' => 'Nomor Hp',
            'tanggal_pesanan' => 'Tanggal Pesanan',
            'jumlah' => 'Jumlah',
            'total_tagihan' => 'Total Tagihan',
            'alamat_lengkap' => 'Alamat Lengkap',
            'status' => 'Status',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'catatan_opsional' => 'Catatan Opsional',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasOne(Produk::className(), ['id_produk' => 'id_produk']);
    }
}
