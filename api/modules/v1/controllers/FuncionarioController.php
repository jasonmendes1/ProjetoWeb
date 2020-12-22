<?php

namespace api\modules\v1\controllers;

use common\models\Funcionario;
use yii\rest\ActiveController;
use yii\web\Response;

class FuncionarioController extends ActiveController
{
    public $modelClass = 'common\models\Funcionario';

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
        $funcionarioModel = new $this->modelClass;
        $recs = $funcionarioModel::find()->all();
        return ['total' => count($recs)];
    }
}