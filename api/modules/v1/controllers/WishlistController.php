<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Wishlist;
use yii\rest\Controller;
use yii\web\Response;

class WishlistController extends Controller
{

	/*
	GET
	Fungsi untuk mendapatkan semua data wishlist berdasarkan id konsumen
	*/
	public function actionById($id_konsumen){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			//select data from tb wishlist
			$sql = "SELECT tb_produk.id_produk, tb_produk.id_user, tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.deskripsi, tb_produk.kondisi, tb_produk.stok, tb_produk.foto_1, tb_produk.foto_2, tb_produk.foto_3,

				tb_wishlist.id_wishlist, tb_wishlist.id_konsumen

				FROM tb_wishlist INNER JOIN tb_produk
				WHERE tb_wishlist.id_produk = tb_produk.id_produk
				AND tb_wishlist.id_konsumen = '$id_konsumen'";

			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionCheck($id_produk, $id_konsumen){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			$sql = "SELECT id_produk,id_konsumen, id_wishlist FROM tb_wishlist WHERE id_produk = '$id_produk'
			AND id_konsumen='$id_konsumen'";

			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionTambahWishlist() {
		Yii::$app->response->format = Response::FORMAT_JSON;

			$response = null;

		if(Yii::$app->request->isPost){
			  $data = Yii::$app->request->Post();

			  $id_konsumen = $data['id_konsumen'];
		      $id_produk = $data['id_produk'];

			  $wishlist = new Wishlist();
		      $wishlist->id_konsumen= $id_konsumen;
		      $wishlist->id_produk= $id_produk;

			if($wishlist->save(false)){
					//jika data berhasil disimpan
					$response['code'] = 1;
					$response['message'] = "Data Wishlist Berhasil Disimpan";
					$response['data'] =$wishlist;
				}else{
					$response['code'] = 0;
					$response['message'] = "Data Wishlist Gagal Ditambah";
					$response['data'] = null;
				}
		}
		return $response;
	}

	public function actionHapusWishlist(){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_wishlist= $data['id_wishlist'];

      $wishlist = Wishlist::find()
                      ->where(['id_wishlist' => $id_wishlist])
                      ->one();

                      if (isset($wishlist)) {
                        if($wishlist->delete()){
                          //jika data berhasil dihapus
                          $response['code'] = 1;
                          $response['message'] = "Data Wishlist Berhasil Dihapus";
                        }else {
                          // code...
                          $response['code'] = 0;
                          $response['message'] = "Data Wishlist Gagal Dihapus";
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