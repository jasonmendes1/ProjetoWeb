<?php

namespace api\modules\v1\controllers;

use common\models\User;
use yii\rest\ActiveController;
use yii\web\Response;
use Yii;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [

            'class' => 'yii\filters\ContentNegotiator',

            'formats' => [

                'application/json' => Response::FORMAT_JSON,

            ]
        ];
        return $behaviors;
    }

    public function actionTotal()
    {
        $userModel = new $this->modelClass;
        $recs = $userModel::find()->all();
        return ['total' => count($recs)];
    }
}