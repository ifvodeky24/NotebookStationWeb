<?php

namespace app\controllers;

use Yii;
use app\models\Produk;
use app\models\ProdukSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use mPDF;

/**
 * ProdukController implements the CRUD actions for Produk model.
 */
class ProdukController extends Controller
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
        $model = new Produk();

        $id_user = Yii::$app->user->identity['id_user'];

       $data= (new \yii\db\Query());
       $data  
       ->select('*')
        ->from('tb_produk')
        ->leftjoin('tb_user', 'tb_user.id_user = tb_produk.id_user')
        ->where(['tb_user.id_user'=> $id_user])
        ->orderBy('id_produk')
        ->all();
       $command = $data->createCommand();
       $modelasset = $command->queryAll();


       $mpdf = new \Mpdf\Mpdf();
       $mpdf->SetTitle('Laporan Data Produk');
       $mpdf->WriteHTML($this->renderPartial('hasil-laporan-produk',[
            'model' => $model,
            'modelasset' => $modelasset,
        ]
        ));
        $mpdf->Output('Laporan Data Produk.pdf','I');
        exit;
    }

    /**
     * Lists all Produk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id_user = Yii::$app->user->identity['id_user'];

        $model= (new \Yii\db\query())
        ->select('*')
        ->from('tb_produk')
        ->leftjoin('tb_user', 'tb_user.id_user = tb_produk.id_user')
        ->where(['tb_user.id_user'=> $id_user])
        ->orderBy('id_produk')
        ->all();

        return $this->render('index', ['model'=>$model,]);
    }

    /**
     * Lists all Produk models.
     * @return mixed
     */
    public function actionIndexPimpinan()
    {

        $id_user = Yii::$app->user->identity['id_user'];

        $nama_toko = Yii::$app->user->identity['nama_toko'];

        $model= (new \Yii\db\query())
        ->select('*')
        ->from('tb_produk')
        ->leftjoin('tb_user', 'tb_user.id_user = tb_produk.id_user')
        ->where(['tb_user.nama_toko'=> $nama_toko])
        ->orderBy('id_produk')
        ->all();

        return $this->render('index-pimpinan', ['model'=>$model,]);
    }

    /**
     * Displays a single Produk model.
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

     public function actionViewPimpinan($id)
    {
        return $this->render('view-pimpinan', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Produk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Produk();

       if ($model->load(Yii::$app->request->post())) {
           $model->foto_1 = UploadedFile::getInstance($model,'foto_1');
           $model->foto_2 = UploadedFile::getInstance($model,'foto_2');
           $model->foto_3 = UploadedFile::getInstance($model,'foto_3');
           $model->foto_4 = UploadedFile::getInstance($model,'foto_4');
           if($model->foto_1) {
              $photo_1 = $model->foto_1->name;
              if ($model->foto_1->saveAs('files/images/produk_images/' .$photo_1)){
                $model->foto_1 = $photo_1;
              }
           } 

           if($model->foto_2) {
              $photo_2 = $model->foto_2->name;
              if ($model->foto_2->saveAs('files/images/produk_images/' .$photo_2)){
                $model->foto_2 = $photo_2;
              }
           } 

           if($model->foto_3) {
              $photo_3 = $model->foto_3->name;
              if ($model->foto_3->saveAs('files/images/produk_images/' .$photo_3)){
                $model->foto_3 = $photo_3;
              }
           } 

           if($model->foto_4) {
              $photo_4 = $model->foto_4->name;
              if ($model->foto_4->saveAs('files/images/produk_images/' .$photo_4)){
                $model->foto_4 = $photo_4;
              }
           } 

           $model->save(false);

        Yii::$app->getSession()->setFlash('success', 'Data Tersimpan');

        return $this->redirect(['view', 'id' => $model->id_produk]);
          
       }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Produk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
   {
        $model = $this->findModel($id);

        $old_photo_produk1 = $model->foto_1;
        $old_photo_produk2 = $model->foto_2;
        $old_photo_produk3 = $model->foto_3;
        $old_photo_produk4 = $model->foto_4;

        if($model->load(Yii::$app->request->post()) ) {
            $model->foto_1 = UploadedFile::getInstance($model,'foto_1');
            $model->foto_2 = UploadedFile::getInstance($model,'foto_2');
            $model->foto_3 = UploadedFile::getInstance($model,'foto_3');
            $model->foto_4 = UploadedFile::getInstance($model,'foto_4');

            if($model->foto_1){
                $photo_1 = $model->foto_1->name;
                if($model->foto_1->saveAs('files/images/produk_images/'.$photo_1)){
                    $model->foto_1 = $photo_1;
                }
            }

            if(empty($model->foto_1)){
                $model->foto_1 = $old_photo_produk1;
            }

            if($model->foto_2){
                $photo_2 = $model->foto_2->name;
                if($model->foto_2->saveAs('files/images/produk_images/'.$photo_2)){
                    $model->foto_2 = $photo_2;
                }
            }

            if(empty($model->foto_2)){
                $model->foto_2 = $old_photo_produk2;
            }

            if($model->foto_3){
                $photo_3 = $model->foto_3->name;
                if($model->foto_3->saveAs('files/images/produk_images/'.$photo_3)){
                    $model->foto_3 = $photo_3;
                }
            }

            if(empty($model->foto_3)){
                $model->foto_3 = $old_photo_produk3;
            }

            if($model->foto_4){
                $photo_4 = $model->foto_4->name;
                if($model->foto_4->saveAs('files/images/produk_images/'.$photo_4)){
                    $model->foto_4 = $photo_4;
                }
            }

            if(empty($model->foto_4)){
                $model->foto_4 = $old_photo_produk4;
            }
            
            $model->save(false);

            Yii::$app->getSession()->setFlash('success', 'Data Tersimpan');
            return $this->redirect(['view', 'id' => $model->id_produk]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Produk model.
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
     * Finds the Produk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
