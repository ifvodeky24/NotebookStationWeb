<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Pembayaran;
use yii\rest\Controller;
use yii\web\Response;

class PembayaranController extends Controller
{
	public function actionBayar() {
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if(Yii::$app->request->isPost){
			  $data = Yii::$app->request->Post();

			  $id_pesanan = $data['id_pesanan'];
			  $bukti_transfer = $data['bukti_transfer'];
			  $jumlah_transfer = $data['jumlah_transfer'];
			  $status = 'Belum Lunas';

			  $pembayaran = new Pembayaran();
		      $pembayaran->id_pesanan= $id_pesanan;
		      $pembayaran->bukti_transfer= $bukti_transfer;
		      $pembayaran->jumlah_transfer= $jumlah_transfer;
		      $pembayaran->status= $status;

			if($pembayaran->save(false)){

	   			$response['code'] = 1;
	   			$response['message'] = "Pembayaran Berhasil";
	   			$response['data'] = $pembayaran;

				}else {
	    		$response['code'] = 0;
				$response['message'] = "Pembayaran Gagal";
				$response['data'] = null;
	      	}
		}
		return $response;
	}

	
}