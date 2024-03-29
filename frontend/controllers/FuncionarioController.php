<?php

namespace frontend\controllers;

use frontend\models\Cliente;
use frontend\models\ClienteFuncionarios;
use frontend\models\Ementa;
use frontend\models\Exercicio;
use Yii;
use frontend\models\Funcionario;
use frontend\models\FuncionarioSearch;
use frontend\models\ListaPlanos;
use frontend\models\Planosnutricao;
use frontend\models\PlanosNutricaoSearch;
use frontend\models\PlanosTreino;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FuncionarioController implements the CRUD actions for Funcionario model.
 */
class FuncionarioController extends Controller
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
     * Lists all Funcionario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FuncionarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Funcionario model.
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
     * Creates a new Funcionario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Funcionario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDFuncionario]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Funcionario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDFuncionario]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Funcionario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Funcionario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Funcionario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Funcionario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionProfilefunc(){
        $user = Yii::$app->user->identity;
        $func = Funcionario::find()->where(['User_id' => $user->getId()])->one();

        $cf = [];
        $clientes = [];
        $planos = [];
        $exercicios = [];
        $ementas = [];
        $client = null;
        

        if($func->cargo_id == 1){
            $cargo = "Personal Trainer";
            foreach(ClienteFuncionarios::find()->where(['id_PT' => $func->IDFuncionario])->all() as $clifunc){
                array_push($cf,$clifunc);
            }
        }elseif($func->cargo_id == 2){
            $cargo = "Nutricionista";
            foreach(ClienteFuncionarios::find()->where(['id_nutricionista' => $func->IDFuncionario])->all() as $clifunc){
                array_push($cf,$clifunc);
            }
        }

        foreach($cf as $clifunc){
            array_push($clientes, Cliente::findOne($clifunc->id_cliente));
        }

        if(count($clientes) >= 1){
            $client = $clientes[0];
        }

        return $this->render('profilefunc',[
            'func' => $func,
            'user' => $user,
            'cargo' => $cargo,
            'clientes' => $clientes,
            'planos' => $planos,
            'exercicios' => $exercicios,
            'selected' => $client,
            'ementas' => $ementas,
        ]);
    }

    public function actionSelectcliente($cliente){
        $user = Yii::$app->user->identity;
        $func = Funcionario::find()->where(['User_id' => $user->getId()])->one();

        $cf = [];
        $clientes = [];
        $planos = [];
        $exercicios = [];
        $ementas = [];
        $client = null;

        if($func->cargo_id == 1){
            $cargo = "Personal Trainer";
            foreach(ClienteFuncionarios::find()->where(['id_PT' => $func->IDFuncionario])->all() as $clifunc){
                array_push($cf,$clifunc);
            }
            foreach(ListaPlanos::find()->where(['IDCliente' => $cliente])->all() as $lp){
                if($lp->IDPlanoTreino != null){
                    array_push($planos,PlanosTreino::findOne($lp->IDPlanoTreino));
                }
            }
        }elseif($func->cargo_id == 2){
            $cargo = "Nutricionista";
            foreach(ClienteFuncionarios::find()->where(['id_nutricionista' => $func->IDFuncionario])->all() as $clifunc){
                array_push($cf,$clifunc);
            }
            foreach(ListaPlanos::find()->where(['IDCliente' => $cliente])->all() as $lp){
                if($lp->IDPlanoNutricao != null){
                    array_push($planos,Planosnutricao::findOne($lp->IDPlanoNutricao));
                }
            }
        }

        foreach($cf as $clifunc){
            array_push($clientes, Cliente::findOne($clifunc->id_cliente));
        }

        if(count($clientes) >= 1){
            $client = Cliente::findOne($cliente);
        }

        return $this->render('profilefunc',[
            'func' => $func,
            'user' => $user,
            'cargo' => $cargo,
            'clientes' => $clientes,
            'planos' => $planos,
            'exercicios' => $exercicios,
            'selected' => $client,
            'ementas' => $ementas,
        ]);
    }

    public function actionSelectplano($plano,$cliente){
        $user = Yii::$app->user->identity;
        $func = Funcionario::find()->where(['User_id' => $user->getId()])->one();

        $cf = [];
        $clientes = [];
        $planos = [];
        $exercicios = [];
        $ementas = [];
        $client = null;

        if($func->cargo_id == 1){
            $cargo = "Personal Trainer";
            foreach(ClienteFuncionarios::find()->where(['id_PT' => $func->IDFuncionario])->all() as $clifunc){
                array_push($cf,$clifunc);
            }
            foreach(ListaPlanos::find()->where(['IDCliente' => $cliente])->all() as $lp){
                if($lp->IDPlanoTreino != null){
                    array_push($planos,PlanosTreino::findOne($lp->IDPlanoTreino));
                }
            }
            foreach(Exercicio::find()->where(['IDPlanoTreino' => $plano])->all() as $exercicio){
                array_push($exercicios,$exercicio);
            }
        }elseif($func->cargo_id == 2){
            $cargo = "Nutricionista";
            foreach(ClienteFuncionarios::find()->where(['id_nutricionista' => $func->IDFuncionario])->all() as $clifunc){
                array_push($cf,$clifunc);
            }
            foreach(ListaPlanos::find()->where(['IDCliente' => $cliente])->all() as $lp){
                if($lp->IDPlanoNutricao != null){
                    array_push($planos,Planosnutricao::findOne($lp->IDPlanoNutricao));
                }
            }
            
            $plan = Planosnutricao::find()->where(['IDPlanoNutricao' => $plano])->one();
            
            if($plan->Segunda != null){
                array_push($ementas, Ementa::find()->where(['IDEmenta' => $plan->Segunda])->one());
            }
            if($plan->Terca != null){
                array_push($ementas, Ementa::find()->where(['IDEmenta' => $plan->Terca])->one());
            }
            if($plan->Quarta != null){
                array_push($ementas, Ementa::find()->where(['IDEmenta' => $plan->Quarta])->one());
            }
            if($plan->Quinta != null){
                array_push($ementas, Ementa::find()->where(['IDEmenta' => $plan->Quinta])->one());
            }
            if($plan->Sexta != null){
                array_push($ementas, Ementa::find()->where(['IDEmenta' => $plan->Sexta])->one());
            }
            if($plan->Sabado != null){
                array_push($ementas, Ementa::find()->where(['IDEmenta' => $plan->Sabado])->one());
            }
        }

        foreach($cf as $clifunc){
            array_push($clientes, Cliente::findOne($clifunc->id_cliente));
        }

        if(count($clientes) >= 1){
            $client = Cliente::findOne($cliente);
        }

        return $this->render('profilefunc',[
            'func' => $func,
            'user' => $user,
            'cargo' => $cargo,
            'clientes' => $clientes,
            'planos' => $planos,
            'exercicios' => $exercicios,
            'selected' => $client,
            'ementas' => $ementas,
        ]);
    }
}
