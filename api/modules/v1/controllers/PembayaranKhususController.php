<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\PembayaranKhusus;
use yii\rest\Controller;
use yii\web\Response;

class PembayaranKhususController extends Controller
{
	public function actionBayar() {
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if(Yii::$app->request->isPost){
			  $data = Yii::$app->request->Post();

			  $id_pesanan_khusus = $data['id_pesanan_khusus'];
			  $bukti_transfer = $data['bukti_transfer'];
			  $jumlah_transfer = $data['jumlah_transfer'];
			  $status = 'Belum Lunas';

			  $pembayaran_khusus = new PembayaranKhusus();
		      $pembayaran_khusus->id_pesanan_khusus= $id_pesanan_khusus;
		      $pembayaran_khusus->bukti_transfer= $bukti_transfer;
		      $pembayaran_khusus->jumlah_transfer= $jumlah_transfer;
		      $pembayaran_khusus->status= $status;

			if($pembayaran_khusus->save(false)){

	   			$response['code'] = 1;
	   			$response['message'] = "Pembayaran Berhasil";
	   			$response['data'] = $pembayaran_khusus;

				}else {
	    		$response['code'] = 0;
				$response['message'] = "Pembayaran Gagal";
				$response['data'] = null;
	      	}
		}
		return $response;
	}

	
}