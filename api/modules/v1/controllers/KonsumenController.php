<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Konsumen;
use yii\rest\Controller;
use yii\web\Response;

class KonsumenController extends Controller
{
	/*
	GET
	Fungsi untuk mendapatkan semua data konsumen
	*/
	public function actionGetAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			//select from tb konsumen
			$konsumen = Konsumen::find()->all();

			$response['master'] = $konsumen;
		}

		return $response;
	}

	public function actionById ($id_konsumen){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

		$konsumen = Konsumen::find()
					->where(['id_konsumen' => $id_konsumen])
					->all();

					$response['master'] = $konsumen;
		}

		return $response;
	}

	Public function actionLogin() {
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if(Yii::$app->request->isPost){
			$data = Yii::$app->request->Post();

			$email = $data['email'];
			$password = $data['password'];

			$konsumen = Konsumen::find()
				->where(['email' => $email])
				->andWhere(['password' =>$password])
				->one();

		if(isset($konsumen)){
			$response['code'] = 1;
			$response['message'] = "Login berhasil";
			$response['data'] = $konsumen;
		} else {
			$response['code'] = 0;
			$response['message'] = "Login gagal, email atau password salah";
			$response['data'] = null;
		}
	}

	return $response;
 }

 	public function actionRegister(){
 		Yii::$app->response->format = Response::FORMAT_JSON;

 		$response = null;

 		if (Yii::$app->request->isPost) {
 			$data = Yii::$app->request->Post();

 			$username = $data['username'];
 			$password = $data['password'];
 			$email = $data['email'];
 			$nama_lengkap = $data['nama_lengkap'];
 			$nomor_hp = $data['nomor_hp'];
 			$alamat = $data['alamat'];

 			$konsumen = new Konsumen();
 			$konsumen->username= $username;
 			$konsumen->password= $password;
 			$konsumen->email= $email;
 			$konsumen->nama_lengkap= $nama_lengkap;
 			$konsumen->nomor_hp= $nomor_hp;
 			$konsumen->alamat= $alamat;

 			if($konsumen->save(false)){

 			$response['code'] = 1;
 			$response['message'] = "Registrasi berhasil";
 			$response['data'] = $konsumen;

 			}else {
          		$response['code'] = 0;
  				$response['message'] = "Registrasi Gagal";
  				$response['data'] = null;
        	}
 		}

 			return $response;
 	}

 	public function actionUbahProfil() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_konsumen= $data['id_konsumen'];
      $username = $data['username'];
      $nama_lengkap = $data['nama_lengkap'];
      $alamat = $data['alamat'];
      $email = $data['email'];
      $nomor_hp = $data['nomor_hp'];
      
      $konsumen = Konsumen::find()
                      ->where(['id_konsumen' => $id_konsumen])
                      ->one();

      if (isset($konsumen)) {
        // code...
        $konsumen->username= $username;
        $konsumen->nama_lengkap= $nama_lengkap;
        $konsumen->alamat= $alamat;
        $konsumen->email= $email;
        $konsumen->nomor_hp= $nomor_hp;

        if ($konsumen->update(false)) {
          // jika data berhasil diupdate
          		$response['code'] = 1;
  				$response['message'] = "Profil berhasil Diubah";
  				$response['data'] = $konsumen;
        }else {
          $response['code'] = 0;
  				$response['message'] = "Profil Gagal Diubah";
  				$response['data'] = null;
        }
      }else {
        $response['code'] = 0;
        $response['message'] = "Data tidak ditemukan";
        $response['data'] = null;
      }
    }
    return $response;

}

public function actionUbahPassword() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_konsumen= $data['id_konsumen'];
      $password = $data['password'];
      
      $konsumens = Konsumen::find()
                      ->where(['id_konsumen' => $id_konsumen])
                      ->one();

      if (isset($konsumens)) {
        // code...
        $konsumens->password= $password;

        if ($konsumens->update(false)) {
          // jika data berhasil diupdate
          		$response['code'] = 1;
  				$response['message'] = "Kata Sandi berhasil Diubah";
  				$response['data'] = $konsumens;
        }else {
          $response['code'] = 0;
  				$response['message'] = "Kata Sandi Gagal Diubah";
  				$response['data'] = null;
        }
      }else {
        $response['code'] = 0;
        $response['message'] = "Data tidak ditemukan";
        $response['data'] = null;
      }
    }
    return $response;

}

	public function actionUploadFoto() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_konsumen= $data['id_konsumen'];
      $foto = $data['foto'];
      
      $konsumens = Konsumen::find()
                      ->where(['id_konsumen' => $id_konsumen])
                      ->one();

      if (isset($konsumens)) {
        // code...
        $konsumens->foto= $foto;

        if ($konsumens->update(false)) {
          // jika data berhasil diupdate
          $response['code'] = 1;
  				$response['message'] = "Foto Profil Berhasil diupload";
  				$response['data'] = $konsumens;
        }else {
          $response['code'] = 0;
  				$response['message'] = "Foto Profil Gagal diupload";
  				$response['data'] = null;
        }
      }else {
        $response['code'] = 0;
        $response['message'] = "Data tidak ditemukan";
        $response['data'] = null;
      }
    }
    return $response;

}

 	

}


?>