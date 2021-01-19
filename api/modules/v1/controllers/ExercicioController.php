<?php

namespace api\modules\v1\controllers;

use common\models\Exercicio;
use yii\rest\ActiveController;
use yii\web\Response;

class ExercicioController extends ActiveController
{
    public $modelClass = 'common\models\Exercicio';

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
}
