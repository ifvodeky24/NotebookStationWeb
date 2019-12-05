<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Keranjang;
use app\models\DetailKeranjang;
use yii\rest\Controller;
use yii\web\Response;

class KeranjangController extends Controller
{

	/*
	GET
	Fungsi untuk mendapatkan semua data keranjang berdasarkan id konsumen
	*/
	public function actionById($id_konsumen){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			//select data from tb keranjang
			$sql = "SELECT tb_produk.id_produk, tb_produk.id_user, tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.deskripsi, tb_produk.kondisi, tb_produk.stok, tb_produk.foto_1, tb_produk.foto_2, tb_produk.foto_3,

				tb_keranjang.id_keranjang, tb_keranjang.id_konsumen,

				tb_detail_keranjang.jumlah

				FROM tb_keranjang INNER JOIN tb_produk, tb_detail_keranjang
				WHERE tb_keranjang.id_keranjang = tb_detail_keranjang.id_keranjang
				AND tb_detail_keranjang.id_produk = tb_produk.id_produk
				AND tb_keranjang.id_konsumen = '$id_konsumen'";

			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	/*
	GET
	Fungsi untuk mendapatkan semua data keranjang berdasarkan id konsumen
	*/
	public function actionCountKeranjang($id_konsumen){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			//select data from tb keranjang
			$sql = "SELECT COUNT(id_keranjang) as number
					FROM tb_keranjang
					WHERE id_konsumen = '$id_konsumen';";

			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionCheck($id_produk, $id_konsumen){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			$sql = "SELECT tb_keranjang.id_keranjang, tb_keranjang.id_konsumen, tb_detail_keranjang.id_produk FROM tb_keranjang INNER JOIN tb_detail_keranjang WHERE tb_keranjang.id_keranjang = tb_detail_keranjang.id_keranjang AND tb_keranjang.id_konsumen='$id_konsumen' AND tb_detail_keranjang.id_produk = '$id_produk';";

			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionTambahKeranjang() {
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if(Yii::$app->request->isPost){
			  $data = Yii::$app->request->Post();

			  $id_konsumen = $data['id_konsumen'];
			  $id_produk = $data['id_produk'];

			  $keranjang = new Keranjang();
		      $keranjang->id_konsumen= $id_konsumen;
		      $keranjang->status= "Tersedia";

			if($keranjang->save(false)){

				$detail_keranjang = new DetailKeranjang();
				$detail_keranjang->id_keranjang = $keranjang->id_keranjang;
				$detail_keranjang->id_produk = $id_produk;
				$detail_keranjang->jumlah = 1;
					
					if ($detail_keranjang->save(false)) {
						//jika data berhasil disimpan
					$response['code'] = 1;
					$response['message'] = "Data Detail Keranjang Berhasil Disimpan";
					$response['data'] =$keranjang;
					$response['data'] =$detail_keranjang;
					}else{
						$response['code'] = 0;
						$response['message'] = "Data Detail Keranjang Gagal Ditambah";
						$response['data'] = null;
					}
				}else{
					$response['code'] = 0;
					$response['message'] = "Data Keranjang Gagal Ditambah";
					$response['data'] = null;
				}
		}
		return $response;
	}

	public function actionHapusKeranjang(){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_keranjang= $data['id_keranjang'];

      $keranjang = Keranjang::find()
                      ->where(['id_keranjang' => $id_keranjang])
                      ->one();

                      if (isset($keranjang)) {
                        if($keranjang->delete()){
                          //jika data berhasil dihapus
                          $response['code'] = 1;
                          $response['message'] = "Data Keranjang Berhasil Dihapus";
                        }else {
                          // code...
                          $response['code'] = 0;
                          $response['message'] = "Data Keranjang Gagal Dihapus";
                        }

                      }else {
                          $response['code'] = 0;
                          $response['message'] = "Data tidak ditemukan";
                        }

      }
      return $response;
    }

}

?>