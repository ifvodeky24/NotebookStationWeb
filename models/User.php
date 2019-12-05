<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

use Yii;

/**
 * This is the model class for table "tb_user".
 *
 * @property int $id_user
 * @property string $username
 * @property string $nama_lengkap
 * @property string $password
 * @property string $authKey
 * @property string $accesToken
 * @property string $email
 * @property string $jabatan
 * @property string $alamat
 * @property string $nomor_hp
 * @property string $level
 * @property string $foto
 * @property string $nama_toko
 * @property string $logo_toko
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Produk[] $produk
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'nama_lengkap', 'password', 'authKey', 'accesToken', 'email', 'jabatan', 'alamat', 'nomor_hp', 'level', 'foto', 'nama_toko', 'logo_toko'], 'required'],
            [['level'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['username', 'nama_lengkap', 'authKey', 'accesToken', 'email', 'jabatan', 'alamat', 'nomor_hp', 'foto', 'nama_toko', 'logo_toko'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'nama_lengkap' => 'Nama Lengkap',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accesToken' => 'Acces Token',
            'email' => 'Email',
            'jabatan' => 'Jabatan',
            'alamat' => 'Alamat',
            'nomor_hp' => 'Nomor Hp',
            'level' => 'Level',
            'foto' => 'Foto',
            'nama_toko' => 'Nama Toko',
            'logo_toko' => 'Logo Toko',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        // mencari user berdasarkan ID dan yg dicari hanya 1
        $user = User::findOne($id);

        if ($user != null) {
            return $user;
        }else{
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
      // mencari user berdasarkan accesToken dan yang dicari hanya 1
      $user = User::find()->where(['accessToken' => $token])->one();

      if ($user != null) {
            return $user;
        }else{
            return null;
        }
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
      // mencari user berdasarkan username dan yang dicari haya 1
        $user = User::find()->where(['username' => $username])->one();

        if ($user != null) {
            return $user;
        }else{
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasMany(Produk::className(), ['id_user' => 'id_user']);
    }
}
