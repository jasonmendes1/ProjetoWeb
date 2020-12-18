<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

class   CargoController extends ActiveController
{
    public $modelClass = 'common\models\Cargo';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTotal(){
        $model = new $this->modelClass;
        $req = $model::find()->all();
        return ['total' => count($req)];
    }

}
