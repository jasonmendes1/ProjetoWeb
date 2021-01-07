<?php

namespace api\modules\v1\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use Yii;

class UserregisterandloginController extends ActiveController
{
    public $modelClass = 'common\models\User';
    public $modelProfile = 'common\models\Profile';
    public $modelSignin = 'common\models\SignupForm';
    public $modelSignupfun = 'common\models\SignupFuncionario';
    public $modelLogin = 'common\models\Loginform';



    protected function verbs() {
        $verbs = parent::verbs();
        $verbs =  [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
        ];
        return $verbs;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'index' || $action === 'view' || $action === 'create' || $action === 'update' || $action === 'delete')
            throw new \yii\web\ForbiddenHttpException('That action must be performed at /user');

    }

    public function actionRegistercliente()
    {
        $avatardefaultdir = '/web/ProjetoWeb/frontend/web/images';

        $signinModel = new $this->modelSignin;

        $signinModel->username = Yii::$app->request->post('username');
        $signinModel->email = Yii::$app->request->post('email');
        $signinModel->password = Yii::$app->request->post('password');
        $signinModel->primeiroNome = Yii::$app->request->post('primeiroNome');
        $signinModel->apelido = Yii::$app->request->post('apelido');
        $signinModel->avatar = Yii::$app->request->post('avatar');
        $signinModel->num_tele = Yii::$app->request->post('num_tele');
        $signinModel->sexo = Yii::$app->request->post('sexo');
        $signinModel->dt_nascimento = Yii::$app->request->post('dt_nascimento');
        $signinModel->nif = Yii::$app->request->post('nif');

        if (!is_null($signinModel->signup($avatardefaultdir))) {
            return true;
        }

        return false;
    }
    public function actionRegisterfuncionario()
    {
        $avatardefaultdir = '/web/ProjetoWeb/frontend/web/images';

        $signinModel = new $this->modelSignupfun;

        $signinModel->username = Yii::$app->request->post('username');
        $signinModel->email = Yii::$app->request->post('email');
        $signinModel->password = Yii::$app->request->post('password');
        $signinModel->primeiroNome = Yii::$app->request->post('primeiroNome');
        $signinModel->apelido = Yii::$app->request->post('apelido');
        $signinModel->avatar = Yii::$app->request->post('avatar');
        $signinModel->num_tele = Yii::$app->request->post('num_tele');
        $signinModel->sexo = Yii::$app->request->post('sexo');
        $signinModel->dt_nascimento = Yii::$app->request->post('dt_nascimento');
        $signinModel->cargo_id = Yii::$app->request->post('cargo_id');

        if (!is_null($signinModel->signup($avatardefaultdir))) {
            return true;
        }

        return false;
    }

    public function actionLoginuser(){
        $loginModel = new $this->modelLogin;
        $modelUser = new $this->modelClass;

        $loginModel->username = Yii::$app->request->post('username');
        $loginModel->password = Yii::$app->request->post('password');

        if($loginModel->login()){
            $req = $modelUser::find()->where(['username' => $loginModel->username])->one();
            return $req;
        }
        return ['Logged in' => 'false'];
    }

    public function actionCreate(){

    }

}
