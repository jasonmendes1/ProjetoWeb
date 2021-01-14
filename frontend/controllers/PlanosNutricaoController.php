<?php

namespace frontend\controllers;

use frontend\models\Ementa;
use frontend\models\ListaPlanos;
use Yii;
use frontend\models\PlanosNutricao;
use frontend\models\PlanosNutricaoSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlanosNutricaoController implements the CRUD actions for PlanosNutricao model.
 */
class PlanosNutricaoController extends Controller
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
     * Lists all PlanosNutricao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlanosNutricaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PlanosNutricao model.
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
     * Creates a new PlanosNutricao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if( Yii::$app->user->can('createPlanonutricao') ){
            $model = new PlanosNutricao();

            if ($model->load(Yii::$app->request->post()) && $model->createPlanoNutricao()) {
                Yii::$app->session->setFlash('success', 'Action Completed');
                return $this->goHome();
            }

            Yii::$app->session->setFlash('failure', 'Action Failed');

            return $this->render('create',[
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException;
        }

    }

    /**
     * Updates an existing PlanosNutricao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if( Yii::$app->user->can('updatePlanonutricao') ){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->IDPlanoNutricao]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing PlanosNutricao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if( Yii::$app->user->can('updatePlanonutricao') ){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException;
        }
    }

    public function actionPlanosnutri(){
        $allplans = ListaPlanos::find()->where(['IDCliente' => Yii::$app->user->identity->id])->all();

        $planosnutri = [];
        $ementas = [];
        $semanas = [];

        if(count($allplans) >= 1){
            foreach($allplans as $plano){
                if($plano->IDPlanoNutricao != null){
                    array_push($planosnutri,PlanosNutricao::find()->where(['IDPlanoNutricao' => $plano->IDPlanoNutricao])->one());
                }
            }
        }

        if(count($planosnutri) >= 1){
            if($planosnutri[0]->Segunda != null){
                array_push($ementas, Ementa::find()->where(['IDEmenta' => $planosnutri[0]->Segunda])->one());
            }
            if($planosnutri[0]->Terca != null){
                array_push($ementas, Ementa::find()->where(['IDEmenta' => $planosnutri[0]->Terca])->one());
            }
            if($planosnutri[0]->Quarta != null){
                array_push($ementas, Ementa::find()->where(['IDEmenta' => $planosnutri[0]->Quarta])->one());
            }
            if($planosnutri[0]->Quinta != null){
                array_push($ementas, Ementa::find()->where(['IDEmenta' => $planosnutri[0]->Quinta])->one());
            }
            if($planosnutri[0]->Sexta != null){
                array_push($ementas, Ementa::find()->where(['IDEmenta' => $planosnutri[0]->Sexta])->one());
            }
            if($planosnutri[0]->Sabado != null){
                array_push($ementas, Ementa::find()->where(['IDEmenta' => $planosnutri[0]->Sabado])->one());
            }
        }
        
        if(count($planosnutri) >= 1){
            foreach($planosnutri as $pn){
                array_push($semanas, $pn->Semana);
            }
            asort($semanas);
        }

        return $this->render('planosnutri',[
            'planosnutricao' => $planosnutri,
            'ementas' => $ementas,
            'semanas' => $semanas,
            'selectedsemana' => $semanas[0],
        ]);
    }

    public function actionSelectsemana($semana){
        $allplans = ListaPlanos::find()->where(['IDCliente' => Yii::$app->user->identity->id])->all();

        if(count($allplans) >= 1){
            foreach($allplans as $plano){
                if($plano->IDPlanoNutricao != null){
                    array_push($planosnutri,PlanosNutricao::find()->where(['IDPlanoNutricao' => $plano->IDPlanoNutricao])->one());
                }
            }
        }

        

        $ementas = [];
        $planosnutri = [];
        $planontri = [];
        $semanas = [];

        array_push($planontri,PlanosNutricao::find()->where(['Semana' => $semana])->one());

        if($planosnutri[0]->Segunda != null){
            array_push($ementas, Ementa::find()->where(['IDEmenta' => $planosnutri[0]->Segunda])->one());
        }
        if($planosnutri[0]->Terca != null){
            array_push($ementas, Ementa::find()->where(['IDEmenta' => $planosnutri[0]->Terca])->one());
        }
        if($planosnutri[0]->Quarta != null){
            array_push($ementas, Ementa::find()->where(['IDEmenta' => $planosnutri[0]->Quarta])->one());
        }
        if($planosnutri[0]->Quinta != null){
            array_push($ementas, Ementa::find()->where(['IDEmenta' => $planosnutri[0]->Quinta])->one());
        }
        if($planosnutri[0]->Sexta != null){
            array_push($ementas, Ementa::find()->where(['IDEmenta' => $planosnutri[0]->Sexta])->one());
        }
        if($planosnutri[0]->Sabado != null){
            array_push($ementas, Ementa::find()->where(['IDEmenta' => $planosnutri[0]->Sabado])->one());
        }

        if(count($planosnutri) >= 1){
            foreach($planosnutri as $pn){
                array_push($semanas, $pn->Semana);
            }
            asort($semanas);
        }
        

        return $this->render('planosnutri', [
            'planosnutricao' => $planosnutri,
            'ementas' => $ementas,
            'semanas' => $semanas,
            'selectedsemana' => $semana,
        ]);
    }

    /**
     * Finds the PlanosNutricao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PlanosNutricao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PlanosNutricao::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
