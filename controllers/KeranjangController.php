<?php

namespace app\controllers;

use Yii;
use app\models\Keranjang;
use app\models\DetailKeranjang;
use app\models\KeranjangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KeranjangController implements the CRUD actions for Keranjang model.
 */
class KeranjangController extends Controller
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

    /**
     * Lists all Keranjang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $nama_toko = Yii::$app->user->identity['nama_toko'];

        $model= (new \Yii\db\query())
        ->select(['tb_keranjang.*', 'tb_detail_keranjang.*', 'tb_konsumen.*', 'tb_user.*', 'tb_produk.*', 'tb_konsumen.nama_lengkap as nama_konsumen'])
        ->from('tb_keranjang')
        ->leftjoin('tb_detail_keranjang', 'tb_detail_keranjang.id_keranjang = tb_keranjang.id_keranjang')
        ->leftjoin('tb_konsumen', 'tb_konsumen.id_konsumen = tb_keranjang.id_konsumen')
        ->leftjoin('tb_produk', 'tb_produk.id_produk = tb_detail_keranjang.id_produk')
        ->leftjoin('tb_user', 'tb_user.id_user = tb_produk.id_user')
        ->where(['tb_user.nama_toko'=> $nama_toko])
        ->all();

        return $this->render('index', ['model' =>$model,]);
    }

    /**
     * Displays a single Keranjang model.
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
     * Creates a new Keranjang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Keranjang();

        if ($model->load(Yii::$app->request->post()) ) {
            if ($model->save(false)) {
                $model_detail = new DetailKeranjang();

                $id_keranjang_post = $model->id_keranjang;
            
                $model_detail->id_keranjang = $id_keranjang_post;

                $model_detail->id_produk = Yii::$app->request->post('Keranjang')['id_produk'];

                $model_detail->jumlah = Yii::$app->request->post('Keranjang')['jumlah'];

                $model_detail->save(false); 
            }

            return $this->redirect(['view', 'id' => $model->id_keranjang]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Keranjang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_keranjang]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Keranjang model.
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
     * Finds the Keranjang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Keranjang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Keranjang::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
