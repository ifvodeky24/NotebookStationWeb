<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Produk;
use yii\rest\Controller;
use yii\web\Response;

class ProdukController extends Controller
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
			$produk = Produk::find()
			->where('stok > 0')
			->all();

			$response['master'] = $produk;
		}

		return $response;
	}

	public function actionById ($id_produk){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT tb_produk.id_produk, tb_produk.id_user, tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.deskripsi, tb_produk.kondisi, tb_produk.stok, tb_produk.foto_1, tb_produk.foto_2, tb_produk.foto_3,

				tb_user.id_user, tb_user.nama_toko, tb_user.logo_toko, tb_user.nomor_hp

				FROM tb_produk INNER JOIN tb_user
				WHERE tb_produk.id_user = tb_user.id_user
				AND tb_produk.id_produk = '$id_produk'";

				$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();

		// $produk = Produk::find()
		// 			->where(['id_produk' => $id_produk])
		// 			->all();

		// 			$response['master'] = $produk;
		}

		return $response;
	}

	public function actionDeleteProduk(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if(Yii::$app->request->isPost) {
			$data = Yii::$app->request->Post();

			$id_produk = $data['id_produk'];

			$produk = Produk::find()
						->where(['id_produk' => $id_produk])
						->one();

						if (isset($produk)) {
							if($produk->delete()){

							$response['code'] = 1;
							$response['message'] = "Delete berhasil";
						}else{

							$response['code'] = 0;
							$response['message'] = "Delete Berhasil";
						}

					}else{
						$response['code'] = 0;
						$response['message'] = "Data tidak ditemukan";
					}


		}
			return $response;
	}

	/*
	GET
	Fungsi untuk mencari data produk
	*/
	public function actionSearch($query){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			// select * from tb_produk berdasarkan nama produk
			$data = "SELECT * FROM tb_produk WHERE nama_produk LIKE '%".$query."%'";

			$response['master'] = Yii::$app->db->createCommand($data)->queryAll();
		}

		return $response;
	}




}

?>