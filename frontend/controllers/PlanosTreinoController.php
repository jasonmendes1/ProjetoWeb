<?php

namespace frontend\controllers;

use frontend\models\Exercicio;
use Yii;
use frontend\models\PlanosTreino;
use frontend\models\PlanosTreinoSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\ListaPlanos;

/**
 * PlanosTreinoController implements the CRUD actions for PlanosTreino model.
 */
class PlanosTreinoController extends Controller
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
     * Lists all PlanosTreino models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlanosTreinoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PlanosTreino model.
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
     * Creates a new PlanosTreino model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if( Yii::$app->user->can('createPlanotreino') ) {

            $model = new PlanosTreino();
            $modelExercicio = new Exercicio();

            if ($model->load(Yii::$app->request->post()) && ($model->createPlanoTreino() || $modelExercicio->createExercicio())) {
                Yii::$app->session->setFlash('success', 'Action Completed');
                return $this->goHome();
            }

            Yii::$app->session->setFlash('failure', 'Action Failed');

            return $this->render('create', [
                'model' => $model,
                'modelExercicio' => $modelExercicio,
            ]);
        }else{
            throw new ForbiddenHttpException;

        }
    }

    /**
     * Updates an existing PlanosTreino model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if( Yii::$app->user->can('updatePlanotreino') ) {

            $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDPlanoTreino]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
        }else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing PlanosTreino model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
       if( Yii::$app->user->can('deletePlanotreino') ){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException;
        }
    }

    public function actionPlanostreino(){
        $allplans = ListaPlanos::find()->where(['IDCliente' => Yii::$app->user->identity->id])->all();

        $planostreino = [];
        $exercicios = [];
        if(count($allplans) >= 1){
            foreach($allplans as $plano){
                if($plano->IDPlanoTreino != null){
                    array_push($planostreino,PlanosTreino::find()->where(['IDPlanoTreino' => $plano->IDPlanoTreino])->one());
                }
            }
        }

        if(count($planostreino) >= 1){
            foreach($planostreino as $pt){
                foreach(Exercicio::find()->where(['IDPlanoTreino' => $pt->IDPlanoTreino])->all() as $exer){
                    array_push($exercicios,$exer);
                }
            }
        }
        
        return $this->render('planostreino', [
        'planostreino' => $planostreino,
        'exercicios' => $exercicios
        ]);
    }

    public function actionTeste($album){
        var_dump($album);
        die();
    }



    /**
     * Finds the PlanosTreino model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PlanosTreino the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PlanosTreino::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
