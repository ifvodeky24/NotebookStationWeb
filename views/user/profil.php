<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSeacrh */
/* @var $dataProvider yii\data\ActiveDataProvider */

$id_user=Yii::$app->user->identity->id_user;
$nama_lengkap=Yii::$app->user->identity->nama_lengkap;
$level=Yii::$app->user->identity->level;
$email=Yii::$app->user->identity->email;
$jabatan=Yii::$app->user->identity->jabatan;
$alamat=Yii::$app->user->identity->alamat;
$nomor_hp=Yii::$app->user->identity->nomor_hp;
$nama_toko=Yii::$app->user->identity->nama_toko;
$logo_toko=Yii::$app->user->identity->logo_toko;
$foto=Yii::$app->user->identity->foto;
User::find()
->where(['id_user' => $id_user])
->one();

$this->title = 'Profil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profil">

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?= empty($user->foto) ?
                  Html::img('@web/files/images/user_images/'.$foto, ['class' => 'profile-user-img img-responsive img-circle', 'alt' => 'User profile picture']) :

                  Html::img(\Yii::$app->params['frontendUrl'] . $user->foto, ['profile-user-img img-responsive img-circle', 'alt' => 'User profile picture' ]) ?>

              <h3 class="profile-username text-center"><?= $nama_lengkap ?></h3>

              <p class="text-muted text-center"><?= $level ?></p>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Informasi Pribadi</a></li>
            </ul>
            <div class="tab-content">
              
              <div class="active tab-pane" id="settings">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'nama_lengkap')->textInput(['value'=> $nama_lengkap, 'readonly'=> true]) ?>

                <?= $form->field($model, 'email')->textInput(['value'=> $email, 'readonly'=> true]) ?>

                <?= $form->field($model, 'nomor_hp')->textInput(['value'=> $nomor_hp, 'readonly'=> true]) ?>

                <?= $form->field($model, 'jabatan')->textInput(['value'=> $jabatan, 'readonly'=> true]) ?>
              
                <?= $form->field($model, 'alamat')->textInput(['value'=> $alamat, 'readonly'=> true]) ?>

                <?= $form->field($model, 'nama_toko')->textInput(['value'=> $nama_toko, 'readonly'=> true]) ?>
                <?php ActiveForm::end(); ?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
