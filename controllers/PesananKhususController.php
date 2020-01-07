<?php

namespace app\controllers;

use Yii;
use app\models\PesananKhusus;
use app\models\PesananKhususSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PesananKhususController implements the CRUD actions for PesananKhusus model.
 */
class PesananKhususController extends Controller
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

    // /**
    //  * Lists all PesananKhusus models.
    //  * @return mixed
    //  */
    // public function actionIndex()
    // {
    //     $searchModel = new PesananKhususSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    public function actionIndex()
    {
        $nama_toko = Yii::$app->user->identity['nama_toko'];

        
        $model= (new \Yii\db\query())
        ->select(['tb_pesanan_khusus.*', 'tb_produk.*', 'tb_user.*'])
        ->from('tb_pesanan_khusus')
        ->leftjoin('tb_produk', 'tb_produk.id_produk = tb_pesanan_khusus.id_produk')
        ->leftjoin('tb_user', 'tb_user.id_user = tb_produk.id_user')
        ->where(['tb_user.nama_toko'=> $nama_toko])
        ->all();

        return $this->render('index', ['model' =>$model,]);
    }

    /**
     * Displays a single PesananKhusus model.
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
     * Creates a new PesananKhusus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PesananKhusus();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pesanan_khusus]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PesananKhusus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pesanan_khusus]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PesananKhusus model.
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
     * Finds the PesananKhusus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PesananKhusus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PesananKhusus::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
