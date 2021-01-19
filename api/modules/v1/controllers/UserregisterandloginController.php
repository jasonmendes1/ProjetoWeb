<?php

namespace api\modules\v1\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use Yii;

class UserregisterandloginController extends ActiveController
{
    public $modelClass = 'common\models\User';
    public $modelSignin = 'common\models\SignupForm';
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

    public function actionRegisteruser()
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

    public function actionVerifica()
    {
        $userModel = new $this->modelClass;
        $request = Yii::$app->request;
        $userInfo = array();


        $user = $request->get('username');
        $pw = $request->get('password_hash');
        $key = "tHeApAcHe6410111";


        $dec = openssl_decrypt(base64_decode($pw), "aes-128-ecb", $key, OPENSSL_RAW_DATA);
        if (!($userModel::find()->where("username=" . '\'' . $user . '\'')->one())) {
            return ['id' => -1];
        }

        $rec = $userModel::find()->where("username=" . '\'' . $user . '\'')->one();
        array_push(
            $userInfo,
            [
                "id" => $rec->Id,
                "username" => $rec->username,
                "email" => $rec->email,
            ]
        );
        if ($rec->validatePassword($dec)) {
            return $userInfo;
        } else {
            return ['id' => -1];
        }
    }

}
