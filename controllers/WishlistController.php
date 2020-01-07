<?php

namespace app\controllers;

use Yii;
use app\models\Wishlist;
use app\models\WishlistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WishlistController implements the CRUD actions for Wishlist model.
 */
class WishlistController extends Controller
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
     * Lists all Wishlist models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $nama_toko = Yii::$app->user->identity['nama_toko'];

        $model= (new \Yii\db\query())
        ->select(['tb_wishlist.*', 'tb_konsumen.*', 'tb_produk.*', 'tb_user.*', 'tb_konsumen.nama_lengkap as nama_konsumen'])
        ->from('tb_wishlist')
        ->leftjoin('tb_konsumen', 'tb_konsumen.id_konsumen = tb_wishlist.id_konsumen')
        ->leftjoin('tb_produk', 'tb_produk.id_produk = tb_wishlist.id_produk')
        ->leftjoin('tb_user', 'tb_user.id_user = tb_produk.id_user')
        ->where(['tb_user.nama_toko'=> $nama_toko])
        ->orderBy('id_wishlist')
        ->all();

        return $this->render('index', ['model'=>$model,]);
    
    }

    /**
     * Displays a single Wishlist model.
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
     * Creates a new Wishlist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Wishlist();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_wishlist]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Wishlist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_wishlist]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Wishlist model.
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
     * Finds the Wishlist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Wishlist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Wishlist::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
