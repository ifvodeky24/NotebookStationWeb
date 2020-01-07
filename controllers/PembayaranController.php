<?php

namespace app\controllers;

use Yii;
use app\models\Pembayaran;
use app\models\PembayaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PembayaranController implements the CRUD actions for Pembayaran model.
 */
class PembayaranController extends Controller
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
        $model = new Pembayaran();

       $data= (new \yii\db\Query());
       $data  
      ->select('*')
        ->from('tb_pembayaran')
        ->all();
       $command = $data->createCommand();
       $modelasset = $command->queryAll();


       $mpdf = new \Mpdf\Mpdf();
       $mpdf->SetTitle('Laporan Data Pembayaran');
       $mpdf->WriteHTML($this->renderPartial('hasil-laporan-pembayaran',[
            'model' => $model,
            'modelasset' => $modelasset,
        ]
        ));
        $mpdf->Output('Laporan Data Pembayaran.pdf','I');
        exit;
    }

    /**
     * Lists all Pembayaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $model= (new \Yii\db\query())
        ->select('*')
        ->from('tb_pembayaran')
        ->all();

        return $this->render('index', ['model' =>$model,]);
    }

    public function actionIndexPimpinan()
    {
        $model= (new \Yii\db\query())
        ->select('*')
        ->from('tb_pembayaran')
        ->all();

        return $this->render('index-pimpinan', ['model' =>$model,]);
    }

    /**
     * Displays a single Pembayaran model.
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
     * Creates a new Pembayaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pembayaran();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pembayaran]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pembayaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pembayaran]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pembayaran model.
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
     * Finds the Pembayaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pembayaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pembayaran::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
