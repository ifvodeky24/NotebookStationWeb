<?php

namespace app\controllers;

use Yii;
use app\models\Pesanan;
use app\models\DetailPesanan;
use app\models\PesananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PesananController implements the CRUD actions for Pesanan model.
 */
class PesananController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionPrintLaporan(){
        // $mpdf=new \Mpdf\mPDF();
        // $mpdf->WriteHTML('Sample Text');
        // $mpdf->Output();
        // exit;
        $model = new Pesanan();

        $nama_toko = Yii::$app->user->identity['nama_toko'];

       $data= (new \yii\db\Query());
       $data  
       ->select('*')
        ->from('tb_pesanan')
        ->leftjoin('tb_konsumen', 'tb_konsumen.id_konsumen = tb_pesanan.id_konsumen')
        ->leftjoin('tb_detail_pesanan', 'tb_detail_pesanan.id_pesanan = tb_pesanan.id_pesanan')
        ->leftjoin('tb_produk', 'tb_produk.id_produk = tb_detail_pesanan.id_produk')
        ->leftjoin('tb_user', 'tb_user.id_user = tb_produk.id_user')
        ->where(['tb_user.nama_toko'=> $nama_toko])
        ->all();
       $command = $data->createCommand();
       $modelasset = $command->queryAll();


       $mpdf = new \Mpdf\Mpdf();
       $mpdf->SetTitle('Laporan Data Pesanan');
       $mpdf->WriteHTML($this->renderPartial('hasil-laporan-pesanan',[
            'model' => $model,
            'modelasset' => $modelasset,
        ]
        ));
        $mpdf->Output('Laporan Data Pesanan.pdf','I');
        exit;
    }

    /**
     * Lists all Pesanan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $nama_toko = Yii::$app->user->identity['nama_toko'];

        
        $model= (new \Yii\db\query())
        ->select(['tb_pesanan.*', 'tb_konsumen.*', 'tb_detail_pesanan.*', 'tb_produk.*', 'tb_user.*', 'tb_konsumen.nama_lengkap as nama_konsumen'])
        ->from('tb_pesanan')
        ->leftjoin('tb_konsumen', 'tb_konsumen.id_konsumen = tb_pesanan.id_konsumen')
        ->leftjoin('tb_detail_pesanan', 'tb_detail_pesanan.id_pesanan = tb_pesanan.id_pesanan')
        ->leftjoin('tb_produk', 'tb_produk.id_produk = tb_detail_pesanan.id_produk')
        ->leftjoin('tb_user', 'tb_user.id_user = tb_produk.id_user')
        ->where(['tb_user.nama_toko'=> $nama_toko])
        ->all();

        return $this->render('index', ['model' =>$model,]);
    }

    public function actionIndexPimpinan()
    {
        $nama_toko = Yii::$app->user->identity['nama_toko'];
        
        $model= (new \Yii\db\query())
        ->select('*')
        ->from('tb_pesanan')
        ->leftjoin('tb_konsumen', 'tb_konsumen.id_konsumen = tb_pesanan.id_konsumen')
        ->leftjoin('tb_detail_pesanan', 'tb_detail_pesanan.id_pesanan = tb_pesanan.id_pesanan')
        ->leftjoin('tb_produk', 'tb_produk.id_produk = tb_detail_pesanan.id_produk')
        ->leftjoin('tb_user', 'tb_user.id_user = tb_produk.id_user')
        ->where(['tb_user.nama_toko'=> $nama_toko])
        ->all();

        return $this->render('index-pimpinan', ['model' =>$model,]);
    }

    /**
     * Displays a single Pesanan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pesanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pesanan();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save(false)) {
                $model_detail = new DetailPesanan();

                $id_pesanan_post = $model->id_pesanan;
            
                $model_detail->id_pesanan = $id_pesanan_post;

                $model_detail->id_produk = Yii::$app->request->post('Pesanan')['id_produk'];

                $model_detail->jumlah = Yii::$app->request->post('Pesanan')['jumlah'];
                
                $model_detail->total_tagihan = Yii::$app->request->post('Pesanan')['total_tagihan'];

                $model_detail->save(false); 
            }

            return $this->redirect(['view', 'id' => $model->id_pesanan]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pesanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) ) {

            if ($model->save(false)) {

                $id_detail_pesanan = DetailPesanan::find()
                                    ->where(['id_pesanan' => $id])->one();

                $id_detail_pesanan->id_produk = Yii::$app->request->post('Pesanan')['id_produk'];;

                $id_detail_pesanan->jumlah = Yii::$app->request->post('Pesanan')['jumlah'];
                
                $id_detail_pesanan->total_tagihan = Yii::$app->request->post('Pesanan')['total_tagihan'];

                $id_detail_pesanan->save(false); 
            }

            return $this->redirect(['view', 'id' => $model->id_pesanan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pesanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pesanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pesanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pesanan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
