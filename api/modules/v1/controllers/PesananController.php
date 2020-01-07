<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Pesanan;
use app\models\DetailPesanan;
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

	public function actionByIdPesanan ($id_konsumen, $kode_pesanan){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status, tb_pesanan.catatan_opsional, tb_pesanan.alamat_lengkap, tb_pesanan.latitude, tb_pesanan.longitude, tb_pesanan.kode_pesanan, tb_pesanan.createdAt, tb_pesanan.updatedAt,

			tb_detail_pesanan.id_produk, tb_detail_pesanan.jumlah, tb_detail_pesanan.total_tagihan
           
				FROM tb_pesanan INNER JOIN tb_konsumen, tb_detail_pesanan
				WHERE tb_pesanan.id_konsumen = tb_konsumen.id_konsumen
				AND tb_pesanan.id_pesanan = tb_detail_pesanan.id_pesanan
				AND tb_pesanan.id_konsumen = '$id_konsumen'
				AND tb_pesanan.kode_pesanan = '$kode_pesanan'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionBeli(){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_konsumen = $data['id_konsumen'];
      $id_produk = $data['id_produk'];
      $jumlah = $data['jumlah'];
      $total_tagihan = $data['total_tagihan'];
      $catatan_opsional = $data['catatan_opsional'];
      $kode_pesanan = $data['kode_pesanan'];
      $alamat_lengkap = $data['alamat_lengkap'];
      $latitude = $data['latitude'];
      $longitude = $data['longitude'];

	  $pesanan = new Pesanan();
      $pesanan->id_konsumen= $id_konsumen;
      $pesanan->status= "Menunggu Pembayaran";
      $pesanan->kode_pesanan= $kode_pesanan;
      $pesanan->catatan_opsional= $catatan_opsional;
      $pesanan->alamat_lengkap= $alamat_lengkap;
      $pesanan->latitude= $latitude;
      $pesanan->longitude= $longitude;

      if($pesanan->save(false)){

				$detail_pesanan = new DetailPesanan();
				$detail_pesanan->id_pesanan = $pesanan->id_pesanan;
				$detail_pesanan->id_produk = $id_produk;
				$detail_pesanan->jumlah = $jumlah;
				$detail_pesanan->total_tagihan = $total_tagihan;
					
					if ($detail_pesanan->save(false)) {
						//jika data berhasil disimpan
					$response['code'] = 1;
					$response['message'] = "Data Detail Pesanan Berhasil Disimpan";
					$response['data'] =$pesanan;
					$response['data'] =$detail_pesanan;
					}else{
						$response['code'] = 0;
						$response['message'] = "Data Detail Pesanan Gagal Ditambah";
						$response['data'] = null;
					}
				}else{
					$response['code'] = 0;
					$response['message'] = "Data Pesanan Gagal Ditambah";
					$response['data'] = null;
				}
      }
      return $response;
    }

    

	public function actionByIdMenungguKonfirmasi ($id_konsumen){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status, tb_pesanan.catatan_opsional, tb_pesanan.alamat_lengkap, tb_pesanan.latitude, tb_pesanan.longitude, tb_pesanan.kode_pesanan,

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

			$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status, tb_pesanan.catatan_opsional, tb_pesanan.alamat_lengkap, tb_pesanan.latitude, tb_pesanan.longitude, tb_pesanan.kode_pesanan,

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

		$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status, tb_pesanan.catatan_opsional, tb_pesanan.alamat_lengkap, tb_pesanan.latitude, tb_pesanan.longitude, tb_pesanan.kode_pesanan,

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

		$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status, tb_pesanan.catatan_opsional, tb_pesanan.alamat_lengkap, tb_pesanan.latitude, tb_pesanan.longitude, tb_pesanan.kode_pesanan,

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

		$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status, tb_pesanan.catatan_opsional, tb_pesanan.alamat_lengkap, tb_pesanan.latitude, tb_pesanan.longitude, tb_pesanan.kode_pesanan,

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

		$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status, tb_pesanan.catatan_opsional, tb_pesanan.alamat_lengkap, tb_pesanan.latitude, tb_pesanan.longitude, tb_pesanan.kode_pesanan,

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

		$sql = "SELECT tb_pesanan.id_pesanan, tb_pesanan.id_konsumen, tb_pesanan.tanggal_pesanan, tb_pesanan.status, tb_pesanan.catatan_opsional, tb_pesanan.alamat_lengkap, tb_pesanan.latitude, tb_pesanan.longitude, tb_pesanan.kode_pesanan,

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

	public function actionBatalPesanan() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pesanan= $data['id_pesanan'];
      $status = "Batal";

      $pesanan = Pesanan::find()
                      ->where(['id_pesanan' => $id_pesanan])
                      ->one();

      if (isset($pesanan)) {
        $pesanan->status = $status;
       
        if ($pesanan->update(false)) {

        		$response['code'] = 1;
  				$response['message'] = "Status Pesanan berhasil diupdate menjadi batal";
  				$response['data'] = $pesanan;
          		
        }else {
          		$response['code'] = 0;
  				$response['message'] = "Status Pesanan gagal diupdate";
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