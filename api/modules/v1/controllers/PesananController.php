<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Pesanan;
use yii\rest\Controller;
use yii\web\Response;

class PesananController extends Controller
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
			$pesanan = Pesanan::find()->all();

			$response['master'] = $pesanan;
		}

		return $response;
	}

	public function actionByIdMenungguKonfirmasi ($id_konsumen){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status,

			tb_detail_pesanan.id_produk,
            
            tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.foto_1

				FROM tb_pesanan INNER JOIN tb_konsumen, tb_detail_pesanan, tb_produk
				WHERE tb_pesanan.id_konsumen = tb_konsumen.id_konsumen
				AND tb_pesanan.id_pesanan = tb_detail_pesanan.id_pesanan
                AND tb_detail_pesanan.id_produk = tb_produk.id_produk
				AND tb_pesanan.status = 'Menunggu Konfirmasi'
				AND tb_pesanan.id_konsumen = '$id_konsumen'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionByIdMenungguPembayaran ($id_konsumen){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status,

			tb_detail_pesanan.id_produk,
            
            tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.foto_1

				FROM tb_pesanan INNER JOIN tb_konsumen, tb_detail_pesanan, tb_produk
				WHERE tb_pesanan.id_konsumen = tb_konsumen.id_konsumen
				AND tb_pesanan.id_pesanan = tb_detail_pesanan.id_pesanan
                AND tb_detail_pesanan.id_produk = tb_produk.id_produk
				AND tb_pesanan.status = 'Menunggu Pembayaran'
				AND tb_pesanan.id_konsumen = '$id_konsumen'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionByIdPesananDiproses ($id_konsumen){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

		$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status,

			tb_detail_pesanan.id_produk,
            
            tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.foto_1

				FROM tb_pesanan INNER JOIN tb_konsumen, tb_detail_pesanan, tb_produk
				WHERE tb_pesanan.id_konsumen = tb_konsumen.id_konsumen
				AND tb_pesanan.id_pesanan = tb_detail_pesanan.id_pesanan
                AND tb_detail_pesanan.id_produk = tb_produk.id_produk
				AND tb_pesanan.status = 'Pesanan Diproses'
				AND tb_pesanan.id_konsumen = '$id_konsumen'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionByIdSedangDikirim ($id_konsumen){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

		$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status,

			tb_detail_pesanan.id_produk,
            
            tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.foto_1

				FROM tb_pesanan INNER JOIN tb_konsumen, tb_detail_pesanan, tb_produk
				WHERE tb_pesanan.id_konsumen = tb_konsumen.id_konsumen
				AND tb_pesanan.id_pesanan = tb_detail_pesanan.id_pesanan
                AND tb_detail_pesanan.id_produk = tb_produk.id_produk
				AND tb_pesanan.status = 'Sedang Dikirim'
				AND tb_pesanan.id_konsumen = '$id_konsumen'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionByIdSampaiTujuan ($id_konsumen){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

		$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status,

			tb_detail_pesanan.id_produk,
            
            tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.foto_1

				FROM tb_pesanan INNER JOIN tb_konsumen, tb_detail_pesanan, tb_produk
				WHERE tb_pesanan.id_konsumen = tb_konsumen.id_konsumen
				AND tb_pesanan.id_pesanan = tb_detail_pesanan.id_pesanan
                AND tb_detail_pesanan.id_produk = tb_produk.id_produk
				AND tb_pesanan.status = 'Sampai Tujuan'
				AND tb_pesanan.id_konsumen = '$id_konsumen'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionByIdSelesai ($id_konsumen){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

		$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status,

			tb_detail_pesanan.id_produk,
            
            tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.foto_1

				FROM tb_pesanan INNER JOIN tb_konsumen, tb_detail_pesanan, tb_produk
				WHERE tb_pesanan.id_konsumen = tb_konsumen.id_konsumen
				AND tb_pesanan.id_pesanan = tb_detail_pesanan.id_pesanan
                AND tb_detail_pesanan.id_produk = tb_produk.id_produk
				AND tb_pesanan.status = 'Selesai'
				AND tb_pesanan.id_konsumen = '$id_konsumen'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionByIdBatal ($id_konsumen){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

		$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status,

			tb_detail_pesanan.id_produk,
            
            tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.foto_1

				FROM tb_pesanan INNER JOIN tb_konsumen, tb_detail_pesanan, tb_produk
				WHERE tb_pesanan.id_konsumen = tb_konsumen.id_konsumen
				AND tb_pesanan.id_pesanan = tb_detail_pesanan.id_pesanan
                AND tb_detail_pesanan.id_produk = tb_produk.id_produk
				AND tb_pesanan.status = 'Batal'
				AND tb_pesanan.id_konsumen = '$id_konsumen'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

}


?>