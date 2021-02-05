<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Exercicio;
use frontend\models\Funcionario;
use frontend\models\PlanosTreino;
use frontend\models\PlanosTreinoSearch;
use yii\debug\panels\EventPanel;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\ListaPlanos;
use phpDocumentor\Reflection\Types\Array_;
use yii\base\Model;


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
            $funcionario = Funcionario::findOne(['User_id' => Yii::$app->user->identity->id]);
            $planoProvider = PlanosTreino::find()->where(['id_PT' => $funcionario->IDFuncionario])
            ->orderBy(['IDPlanoTreino' => SORT_ASC])
            ->all();

            if (($model->load(Yii::$app->request->post()) && $model->createPlanoTreino()) || ($modelExercicio->load(Yii::$app->request->post()) && $modelExercicio->createExercicio())) {
                Yii::$app->session->setFlash('success', 'Action Completed');
                return $this->goHome();
            }else{
                Yii::$app->session->setFlash('failure', 'Action Failed');
            }

            return $this->render('create', [
                'model' => $model,
                'modelExercicio' => $modelExercicio,
                'planoProvider' => $planoProvider,
            ]);
        }else{
            throw new ForbiddenHttpException;
        }
    }

    public function actionSelectplano($id){
        $modelExercicio = new Exercicio();
        $model = new PlanosTreino();
        $funcionario = Funcionario::findOne(['User_id' => Yii::$app->user->identity->id]);
        $planoProvider = PlanosTreino::find()->where(['id_PT' => $funcionario->IDFuncionario])
        ->orderBy(['IDPlanoTreino' => SORT_ASC])
        ->all();
        $exercicios = Exercicio::find()->where(['IDPlanoTreino' => $id])->all();


        return $this->render('create', [
            'model' => $model,
            'modelExercicio' => $modelExercicio,
            'idplanotreino' => $id,
            'planoProvider' => $planoProvider,
            'exercicios' => $exercicios
        ]);
    }

    
    
    public function actionCriarexercicio($idplanotreino)
    {
        $modelExercicio = new Exercicio();
        $model = new PlanosTreino();
        $funcionario = Funcionario::findOne(['User_id' => Yii::$app->user->identity->id]);
        $planoProvider = PlanosTreino::find()->where(['id_PT' => $funcionario->IDFuncionario])
        ->orderBy(['IDPlanoTreino' => SORT_ASC])
        ->all();
        $exercicios = Exercicio::find()->where(['IDPlanoTreino' => $idplanotreino])->all();

        $op = 1;
        $modelExercicio->IDPlanoTreino = $idplanotreino;

        if($modelExercicio->load(Yii::$app->request->post())){
            $modelExercicio->save();
            $exercicios = Exercicio::find()->where(['IDPlanoTreino' => $idplanotreino])->all();
            return $this->render('create', [
                'model' => $model,
                'modelExercicio' => $modelExercicio,
                'idplanotreino' => $idplanotreino,
                'planoProvider' => $planoProvider,
                'exercicios' => $exercicios,
            ]);
        }

        if ($modelExercicio->load(Yii::$app->request->post()) && $modelExercicio->createExercicio()){
            Yii::$app->session->setFlash('success', 'Action Completed');
            return $this->goHome();
        }else{
            Yii::$app->session->setFlash('failure', 'Action Failed');
        }
        return $this->render('create', [
            'model' => $model,
            'modelExercicio' => $modelExercicio,
            'idplanotreino' => $idplanotreino,
            'planoProvider' => $planoProvider,
            'exercicios' => $exercicios,
            'option' => $op,
        ]);
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
        $semanas = [];
        $exercicios = [];
        $selectedsemana = null;

        if(count($allplans) >= 1){
            foreach($allplans as $plano){
                if($plano->IDPlanoTreino != null){
                    if(PlanosTreino::find()->where(['IDPlanoTreino' => $plano->IDPlanoTreino])->one() != null){
                        array_push($planostreino,PlanosTreino::find()->where(['IDPlanoTreino' => $plano->IDPlanoTreino])->one());
                    }
                }   
            }
        }

        if(count($planostreino) >= 1){
            foreach($planostreino as $pt){
                array_push($semanas,$pt->semana);
            }
        }

        if(count($semanas) >= 1){
            $semanas = array_unique($semanas);
            asort($semanas);

            $timestamp = mktime(0,0,0,1,1,2021) + ($semanas[0] *7*24*60*60);
            $tsforweekday = $timestamp - 86400 * (date('N', $timestamp) - 1);
            $data = date('Y-m-d',$tsforweekday);
        }

        unset($planostreino);
        $planostreino = [];

        if(count($allplans) >= 1){
            foreach($allplans as $plano){
                if($plano->IDPlanoTreino != null){
                    array_push($planostreino,PlanosTreino::find()->where(['IDPlanoTreino' => $plano->IDPlanoTreino, 'dia_treino' => $data])->one());
                }
            }
        }

        if(count($planostreino) >= 1){
            foreach($planostreino as $pt){
                if($pt != null){
                    if($pt->semana == $semanas[0]){
                        foreach(Exercicio::find()->where(['IDPlanoTreino' => $pt->IDPlanoTreino])->all() as $exer){
                            array_push($exercicios,$exer);
                        }
                    }
                }
            }
        }

        if(count($semanas) >= 1){
            $selectedsemana = $semanas[0];
        }

        
        return $this->render('planostreino', [
        'planostreino' => $planostreino,
        'semanas' => $semanas,
        'exercicios' => $exercicios,
        'selectedsemana' => $selectedsemana,
        ]);
    }

    public function actionTeste(){
        return $this->render('planostreino');
    }

    public function actionSelectsemana($smn){

        $allplans = ListaPlanos::find()->where(['IDCliente' => Yii::$app->user->identity->id])->all();

        $planostreino = [];
        $semanas = [];
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
                array_push($semanas,$pt->semana);
            }
        }

        if(count($semanas) >= 1){
            $semanas = array_unique($semanas);
            asort($semanas);

            $timestamp = mktime(0,0,0,1,1,2021) + ($semanas[0] *7*24*60*60);
            $tsforweekday = $timestamp - 86400 * (date('N', $timestamp) - 1);
            $data = date('Y-m-d',$tsforweekday);
        }

        
        unset($planostreino);
        $planostreino = [];

        if(count($allplans) >= 1){
            foreach($allplans as $plano){
                if($plano->IDPlanoTreino != null){
                    array_push($planostreino,PlanosTreino::find()->where(['IDPlanoTreino' => $plano->IDPlanoTreino, 'dia_treino' => $data])->one());
                }
            }
        }

        if(count($planostreino) >= 1){
            foreach($planostreino as $pt){
                if($pt != null){
                    if($pt->semana == $smn){
                        foreach(Exercicio::find()->where(['IDPlanoTreino' => $pt->IDPlanoTreino])->all() as $exer){
                            array_push($exercicios,$exer);
                        }
                    }
                }
            }
        }

        return $this->render('planostreino', [
            //'planostreino' => $planostreino,
            'exercicios' => $exercicios,
            'semanas' => $semanas,
            'selectedsemana' => $smn,
        ]);
    }

    public function actionSelectdia($selectedsemana,$dia){
        $allplans = ListaPlanos::find()->where(['IDCliente' => Yii::$app->user->identity->id])->all();

        $planostreino = [];
        $semanas = [];
        $exercicios = [];

        if(count($allplans) >= 1){
            foreach($allplans as $plano){
                if($plano->IDPlanoTreino != null){
                    if(PlanosTreino::find()->where(['IDPlanoTreino' => $plano->IDPlanoTreino, 'dia_treino' => $dia])->one() != null){
                        array_push($planostreino,PlanosTreino::find()->where(['IDPlanoTreino' => $plano->IDPlanoTreino, 'dia_treino' => $dia])->one());
                    }
                }
            }
        }


        if(count($planostreino) >= 1){
            foreach($planostreino as $pt){
                if(($pt->semana == $selectedsemana) && ($selectedsemana != -1)){
                    foreach(Exercicio::find()->where(['IDPlanoTreino' => $pt->IDPlanoTreino])->all() as $exer){
                        array_push($exercicios,$exer);
                    }
                }
            }
        }

        unset($planostreino);
        $planostreino = [];
        
        if(count($allplans) >= 1){
            foreach($allplans as $plano){
                if($plano->IDPlanoTreino != null){
                    array_push($planostreino,PlanosTreino::find()->where(['IDPlanoTreino' => $plano->IDPlanoTreino])->one());
                }
            }
        }

        if(count($planostreino) >= 1){
            foreach($planostreino as $pt){
                array_push($semanas, $pt->semana);
                $semanas = array_unique($semanas);
                asort($semanas);
            }
        }

        if(count($semanas) >= 1){
            $semanas = array_unique($semanas);
            asort($semanas);
        }

        if($selectedsemana == -1){
            $selectedsemana = date('W',strtotime('Monday this week'));
        }

        return $this->render('planostreino',[
            //'planostreino' => $planostreino,
            'exercicios' => $exercicios,
            'semanas' => $semanas,
            'selectedsemana' => $selectedsemana,
            'dia' => $dia,
        ]);
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
