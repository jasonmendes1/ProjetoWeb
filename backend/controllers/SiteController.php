<?php
namespace backend\controllers;

use backend\models\SignupFuncionario;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                          'actions' => ['login', 'error'],
                          'allow' => true,
                    ],
                      [
                          'actions' => ['logout'],
                          'allow' => true,
                          'roles' => ['@'],
                      ],
                      [
                          'actions' => ['index'],
                          'allow' => true,
                          'roles' => ['admin'],
                      ],
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (\Yii::$app->user->can('openBackend')){
                return $this->goBack();
            }else{
                Yii::$app->user->logout();
                Yii::$app->session->setFlash('danger', 'Nao tem permissão para aceder a esta zona do site.');
                return $this->goHome();
            }
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        if (\Yii::$app->user->can('signUpFuncionario')){
            $model = new SignupFuncionario();
            $getAvatar = UploadedFile::getInstance($model,'avatar');
            if ($model->load(Yii::$app->request->post()) && $model->signup($getAvatar)) {
                Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
                return $this->goHome();
            }

            return $this->render('signup', [
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException;
        }
    }
}
