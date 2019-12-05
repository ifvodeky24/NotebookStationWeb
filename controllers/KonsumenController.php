<?php

namespace app\controllers;

use Yii;
use app\models\Konsumen;
use app\models\KonsumenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * KonsumenController implements the CRUD actions for Konsumen model.
 */
class KonsumenController extends Controller
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
     * Lists all Konsumen models.
     * @return mixed
     */
    public function actionIndex()
    {
       $model= (new \Yii\db\query())
       ->select('*')
       ->from('tb_konsumen')
       ->orderBy('id_konsumen')
       ->all();

       return $this->render('index', ['model'=>$model,]);
    }

    /**
     * Displays a single Konsumen model.
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
     * Creates a new Konsumen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Konsumen();

        if ($model->load(Yii::$app->request->post())) {
            $model->foto = UploadedFile::getInstance($model, 'foto');
             if ($model->foto){
                 $photos = $model->foto->name;
                 if ($model->foto->saveAs ('files/images/konsumen_images/' . $photos)) {
                    $model->foto = $photos;
                 }

             }

        $model->save(false);

         Yii::$app->getSession()->setFlash('success','Data Tersimpan');
        return $this->redirect (['view', 'id' => $model->id_konsumen]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Konsumen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
       $model = $this->findModel($id);

       $old_photo_user = $model->foto;

        if ($model->load(Yii::$app->request->post()) ) {
            $model->foto = UploadedFile::getInstance($model, 'foto');
            if($model->foto){
                $pp = $model->foto->name;
                if($model->foto->saveAs('files/images/konsumen_images/' .$pp)) {
                   $model->foto =$pp;
                }
            }
            if (empty($model->foto)){
                $model->foto = $old_photo_user;
            }
            $model->save(false);

            Yii::$app->getSession()->setFlash('success','Data Tersimpan');
            return $this->redirect(['view', 'id' => $model->id_konsumen]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Konsumen model.
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
     * Finds the Konsumen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Konsumen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Konsumen::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

     public function actionSearch($query){
        Yii::$app->response->format = Response::FORMAT_JSON;

        $response = null;

        if(Yii::$app->request->isGet){

            // select from tb_produk berdasarkan nama produk

            $data = "SELECT * FROM tb_konsumen WHERE nama_lengkap LIKE '%" .$query."
                    %'";

            $response['master'] = Yii::$app->db->createCommand ($data)->queryAll(
                   );
        }

            return $response;
        }
}


?>