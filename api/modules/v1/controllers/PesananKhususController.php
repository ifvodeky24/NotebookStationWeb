<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\PesananKhusus;
use yii\rest\Controller;
use yii\web\Response;

class PesananKhususController extends Controller
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
			$pesanan_khusus = PesananKhusus::find()->all();

			$response['master'] = $pesanan_khusus;
		}

		return $response;
	}

	public function actionById ($kode_pesanan){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT tb_pesanan_khusus.id_pesanan_khusus, tb_pesanan_khusus.kode_pesanan, tb_pesanan_khusus.tanggal_pesanan, tb_pesanan_khusus.jumlah, tb_pesanan_khusus.total_tagihan, tb_pesanan_khusus.alamat_lengkap, tb_pesanan_khusus.status, tb_pesanan_khusus.latitude, tb_pesanan_khusus.longitude, tb_pesanan_khusus.catatan_opsional, tb_pesanan_khusus.createdAt, tb_pesanan_khusus.updatedAt,tb_pesanan_khusus.id_produk, tb_pesanan_khusus.nama_lengkap, tb_pesanan_khusus.email, tb_pesanan_khusus.nomor_hp
           
				FROM tb_pesanan_khusus
				WHERE tb_pesanan_khusus.kode_pesanan = '$kode_pesanan'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionBeli(){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $kode_pesanan = $data['kode_pesanan'];
      $id_produk = $data['id_produk'];
      $jumlah = $data['jumlah'];
      $total_tagihan = $data['total_tagihan'];
      $alamat_lengkap = $data['alamat_lengkap'];
      $status = $data['status'];
      $latitude = $data['latitude'];
      $longitude = $data['longitude'];
      $catatan_opsional = $data['catatan_opsional'];
      $nama_lengkap = $data['nama_lengkap'];
      $email = $data['email'];
      $nomor_hp = $data['nomor_hp'];
      
	  $pesanan_khusus = new PesananKhusus();
      
      $pesanan_khusus->kode_pesanan= $kode_pesanan;
      $pesanan_khusus->id_produk= $id_produk;
      $pesanan_khusus->jumlah= $jumlah;
      $pesanan_khusus->total_tagihan= $total_tagihan;
      $pesanan_khusus->alamat_lengkap= $alamat_lengkap;
      $pesanan_khusus->status= "Menunggu Pembayaran";
      $pesanan_khusus->latitude= $latitude;
      $pesanan_khusus->longitude= $longitude;
      $pesanan_khusus->catatan_opsional= $catatan_opsional;
      $pesanan_khusus->nama_lengkap= $nama_lengkap;
      $pesanan_khusus->email= $email;
      $pesanan_khusus->nomor_hp= $nomor_hp;

	      if($pesanan_khusus->save(false)){
	        //jika data berhasil disimpan
	        $response['code'] = 1;
					$response['message'] = "Data Pesanan Berhasil Dibeli";
					$response['data'] = $pesanan_khusus;
	      }else{
	        $response['code'] = 0;
					$response['message'] = "Data Pesanan Gagal Dibeli";
					$response['data'] = null;
	      }
      }
      return $response;
    }

    

	public function actionByIdMenungguKonfirmasi ($kode_pesanan){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT tb_pesanan_khusus.id_pesanan_khusus, tb_pesanan_khusus.kode_pesanan, tb_pesanan_khusus.tanggal_pesanan, tb_pesanan_khusus.jumlah, tb_pesanan_khusus.total_tagihan, tb_pesanan_khusus.alamat_lengkap, tb_pesanan_khusus.status, tb_pesanan_khusus.latitude, tb_pesanan_khusus.longitude, tb_pesanan_khusus.catatan_opsional, tb_pesanan_khusus.createdAt, tb_pesanan_khusus.updatedAt,tb_pesanan_khusus.id_produk, tb_pesanan_khusus.nama_lengkap, tb_pesanan_khusus.email, tb_pesanan_khusus.nomor_hp,

			tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.foto_1
           
				FROM tb_pesanan_khusus INNER JOIN tb_produk
				WHERE tb_pesanan_khusus.status = 'Menunggu Konfirmasi'
				AND tb_pesanan_khusus.id_produk = tb_produk.id_produk
				AND tb_pesanan_khusus.kode_pesanan = '$kode_pesanan'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionByIdMenungguPembayaran ($kode_pesanan){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT tb_pesanan_khusus.id_pesanan_khusus, tb_pesanan_khusus.kode_pesanan, tb_pesanan_khusus.tanggal_pesanan, tb_pesanan_khusus.jumlah, tb_pesanan_khusus.total_tagihan, tb_pesanan_khusus.alamat_lengkap, tb_pesanan_khusus.status, tb_pesanan_khusus.latitude, tb_pesanan_khusus.longitude, tb_pesanan_khusus.catatan_opsional, tb_pesanan_khusus.createdAt, tb_pesanan_khusus.updatedAt,tb_pesanan_khusus.id_produk, tb_pesanan_khusus.nama_lengkap, tb_pesanan_khusus.email, tb_pesanan_khusus.nomor_hp,

			tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.foto_1
           
				FROM tb_pesanan_khusus INNER JOIN tb_produk
				WHERE tb_pesanan_khusus.status = 'Menunggu Pembayaran'
				AND tb_pesanan_khusus.id_produk = tb_produk.id_produk
				AND tb_pesanan_khusus.kode_pesanan = '$kode_pesanan'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionByIdPesananDiproses ($kode_pesanan){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

		$sql = "SELECT tb_pesanan_khusus.id_pesanan_khusus, tb_pesanan_khusus.kode_pesanan, tb_pesanan_khusus.tanggal_pesanan, tb_pesanan_khusus.jumlah, tb_pesanan_khusus.total_tagihan, tb_pesanan_khusus.alamat_lengkap, tb_pesanan_khusus.status, tb_pesanan_khusus.latitude, tb_pesanan_khusus.longitude, tb_pesanan_khusus.catatan_opsional, tb_pesanan_khusus.createdAt, tb_pesanan_khusus.updatedAt,tb_pesanan_khusus.id_produk, tb_pesanan_khusus.nama_lengkap, tb_pesanan_khusus.email, tb_pesanan_khusus.nomor_hp,

			tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.foto_1
           
				FROM tb_pesanan_khusus INNER JOIN tb_produk
				WHERE tb_pesanan_khusus.status = 'Pesanan Diproses'
				AND tb_pesanan_khusus.id_produk = tb_produk.id_produk
				AND tb_pesanan_khusus.kode_pesanan = '$kode_pesanan'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionByIdSedangDikirim ($kode_pesanan){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

		$sql = "SELECT tb_pesanan_khusus.id_pesanan_khusus, tb_pesanan_khusus.kode_pesanan, tb_pesanan_khusus.tanggal_pesanan, tb_pesanan_khusus.jumlah, tb_pesanan_khusus.total_tagihan, tb_pesanan_khusus.alamat_lengkap, tb_pesanan_khusus.status, tb_pesanan_khusus.latitude, tb_pesanan_khusus.longitude, tb_pesanan_khusus.catatan_opsional, tb_pesanan_khusus.createdAt, tb_pesanan_khusus.updatedAt,tb_pesanan_khusus.id_produk, tb_pesanan_khusus.nama_lengkap, tb_pesanan_khusus.email, tb_pesanan_khusus.nomor_hp,

			tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.foto_1
           
				FROM tb_pesanan_khusus INNER JOIN tb_produk
				WHERE tb_pesanan_khusus.status = 'Sedang Dikirim'
				AND tb_pesanan_khusus.id_produk = tb_produk.id_produk
				AND tb_pesanan_khusus.kode_pesanan = '$kode_pesanan'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionByIdSampaiTujuan ($kode_pesanan){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

		$sql = "SELECT tb_pesanan_khusus.id_pesanan_khusus, tb_pesanan_khusus.kode_pesanan, tb_pesanan_khusus.tanggal_pesanan, tb_pesanan_khusus.jumlah, tb_pesanan_khusus.total_tagihan, tb_pesanan_khusus.alamat_lengkap, tb_pesanan_khusus.status, tb_pesanan_khusus.latitude, tb_pesanan_khusus.longitude, tb_pesanan_khusus.catatan_opsional, tb_pesanan_khusus.createdAt, tb_pesanan_khusus.updatedAt,tb_pesanan_khusus.id_produk, tb_pesanan_khusus.nama_lengkap, tb_pesanan_khusus.email, tb_pesanan_khusus.nomor_hp,

			tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.foto_1
           
				FROM tb_pesanan_khusus INNER JOIN tb_produk
				WHERE tb_pesanan_khusus.status = 'Sampai Tujuan'
				AND tb_pesanan_khusus.id_produk = tb_produk.id_produk
				AND tb_pesanan_khusus.kode_pesanan = '$kode_pesanan'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionByIdSelesai ($kode_pesanan){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

		$sql = "SELECT tb_pesanan_khusus.id_pesanan_khusus, tb_pesanan_khusus.kode_pesanan, tb_pesanan_khusus.tanggal_pesanan, tb_pesanan_khusus.jumlah, tb_pesanan_khusus.total_tagihan, tb_pesanan_khusus.alamat_lengkap, tb_pesanan_khusus.status, tb_pesanan_khusus.latitude, tb_pesanan_khusus.longitude, tb_pesanan_khusus.catatan_opsional, tb_pesanan_khusus.createdAt, tb_pesanan_khusus.updatedAt,tb_pesanan_khusus.id_produk, tb_pesanan_khusus.nama_lengkap, tb_pesanan_khusus.email, tb_pesanan_khusus.nomor_hp,

			tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.foto_1
           
				FROM tb_pesanan_khusus INNER JOIN tb_produk
				WHERE tb_pesanan_khusus.status = 'Selesai'
				AND tb_pesanan_khusus.id_produk = tb_produk.id_produk
				AND tb_pesanan_khusus.kode_pesanan = '$kode_pesanan'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionByIdBatal ($kode_pesanan){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

		$sql = "SELECT tb_pesanan_khusus.id_pesanan_khusus, tb_pesanan_khusus.kode_pesanan, tb_pesanan_khusus.tanggal_pesanan, tb_pesanan_khusus.jumlah, tb_pesanan_khusus.total_tagihan, tb_pesanan_khusus.alamat_lengkap, tb_pesanan_khusus.status, tb_pesanan_khusus.latitude, tb_pesanan_khusus.longitude, tb_pesanan_khusus.catatan_opsional, tb_pesanan_khusus.createdAt, tb_pesanan_khusus.updatedAt,tb_pesanan_khusus.id_produk, tb_pesanan_khusus.nama_lengkap, tb_pesanan_khusus.email, tb_pesanan_khusus.nomor_hp,

			tb_produk.nama_produk, tb_produk.merk_produk, tb_produk.harga, tb_produk.foto_1
           
				FROM tb_pesanan_khusus INNER JOIN tb_produk
				WHERE tb_pesanan_khusus.status = 'Batal'
				AND tb_pesanan_khusus.id_produk = tb_produk.id_produk
				AND tb_pesanan_khusus.kode_pesanan = '$kode_pesanan'";

					$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionBatalPesanan() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pesanan_khusus= $data['id_pesanan_khusus'];
      $status = "Batal";

      $pesanan_khusus = PesananKhusus::find()
                      ->where(['id_pesanan_khusus' => $id_pesanan_khusus])
                      ->one();

      if (isset($pesanan_khusus)) {
        $pesanan_khusus->status = $status;
       
        if ($pesanan_khusus->update(false)) {

        		$response['code'] = 1;
  				$response['message'] = "Status Pesanan berhasil diupdate menjadi batal";
  				$response['data'] = $pesanan_khusus;
          		
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