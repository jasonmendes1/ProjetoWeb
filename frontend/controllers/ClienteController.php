<?php

namespace frontend\controllers;

use Codeception\Command\Console;
use Codeception\PHPUnit\ConsolePrinter;
use Yii;
use frontend\models\Cliente;
use frontend\models\ClienteSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Funcionario;
use frontend\models\ClienteFuncionarios;
use frontend\models\Desconto;
use frontend\models\Subscricao;
use frontend\models\TipoSubscricao;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;
use yii\helpers\ArrayHelper;

/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class ClienteController extends Controller
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
     * Lists all Cliente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cliente model.
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
     * Creates a new Cliente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cliente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDCliente]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cliente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDCliente]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cliente model.
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
     * Finds the Cliente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cliente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cliente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionProfile(){
        if(Yii::$app->user->can('verPerfil')){
            $user = Yii::$app->user->identity;
            $cliente = Cliente::find()->where(['User_id' => $user->getId()])->one();

            $cf = ClienteFuncionarios::find()->where(['id_cliente' => $user->getId()])->one();

            if($cf != null){
                $pt = $cf->pT;
                $nutri = $cf->nutricionista;
            }else{
                $pt = "";
                $nutri = "";
            }

            return $this->render('profile', [
                'cliente' => $cliente,
                'user' => $user,
                'pt' => $pt,
                'nutri' => $nutri,
            ]);
        }else{
            throw new ForbiddenHttpException;
        }
    }

    public function actionTeste($teste){
        return $this->render('profile',[
            'teste' => $teste,
        ]);
    }

    public function actionInscricao(){
        $cliente = Cliente::find()->where(['User_id' => Yii::$app->user->identity->getId()])->one();
        $sub = Subscricao::find()->where(['id_cliente' => $cliente->IDCliente])->one();
        $tipos_subs = ArrayHelper::map(TipoSubscricao::find()->all(), 'IDTipoSubscricao','tipo');
        $descontos = ArrayHelper::map(Desconto::find()->all(),'IDDesconto','nome');
        if(!isset($model)){
            $model = new Subscricao();
        }

        return $this->render('inscricao',[
            'cliente' => $cliente,
            'sub' => $sub,
            'tipossub' => $tipos_subs,
            'descontos' => $descontos,
            'model' => $model,
        ]);
    }

    public function actionCriarsubscricao(){
        //1 para criar
        $cliente = Cliente::find()->where(['User_id' => Yii::$app->user->identity->getId()])->one();
        $sub = Subscricao::find()->where(['id_cliente' => $cliente->IDCliente])->one();
        $tipos_subs = ArrayHelper::map(TipoSubscricao::find()->all(), 'IDTipoSubscricao','tipo');
        $descontos = ArrayHelper::map(Desconto::find()->all(),'IDDesconto','nome');
        $model = new Subscricao();
        
        $option = 1;

        if($model->load(Yii::$app->request->post())){
            $tipo = TipoSubscricao::findOne($model->id_tipo);
            $desc = Desconto::findOne($model->id_desconto);
            $total = ($tipo->valor - ($tipo->valor * $desc->quantidade)) * $model->meses;
            $option = 1;

            return $this->render('inscricao',[
                'cliente' => $cliente,
                'sub' => $sub,
                'tipossub' => $tipos_subs,
                'descontos' => $descontos,
                'model' => $model,
                'precobase' => $tipo->valor,
                'multi' => $model->meses,
                'precobasemulti' => $tipo->valor * $model->meses,
                'desconto'=> $desc->quantidade * 100,
                'total' => $total,
                'option' => $option,
            ]);
        }

        return $this->render('inscricao',[
                'cliente' => $cliente,
                'sub' => $sub,
                'tipossub' => $tipos_subs,
                'descontos' => $descontos,
                'model' => $model,
                'option' => $option,
            ]);
    }

    public function actionRenovarsubscricao(){
        //2 para renovar
        $cliente = Cliente::find()->where(['User_id' => Yii::$app->user->identity->getId()])->one();
        $sub = Subscricao::find()->where(['id_cliente' => $cliente->IDCliente])->one();
        $option = 2;
        $model = Subscricao::find()->where(['id_cliente' => $cliente->IDCliente])->one();

        if($model->load(Yii::$app->request->post())){
            $tipo = TipoSubscricao::findOne($model->id_tipo);
            $desc = Desconto::findOne($model->id_desconto);
            $total = ($tipo->valor - ($tipo->valor * $desc->quantidade)) * $model->meses;
            $tipos_subs = ArrayHelper::map(TipoSubscricao::find()->all(), 'IDTipoSubscricao','tipo');
            $descontos = ArrayHelper::map(Desconto::find()->all(),'IDDesconto','nome');
            $option = 2;

            return $this->render('inscricao',[
                'cliente' => $cliente,
                'sub' => $sub,
                'tipossub' => $tipos_subs,
                'descontos' => $descontos,
                'model' => $model,
                'precobase' => $tipo->valor,
                'multi' => $model->meses,
                'precobasemulti' => $tipo->valor * $model->meses,
                'desconto'=> $desc->quantidade * 100,
                'total' => $total,
                'option' => $option,
            ]);
        }
        return $this->render('inscricao',[
            'cliente' => $cliente,
            'sub' => $sub,
            'option' => $option,
            'model' => $model,
            ]);
    }

    public function actionEliminiarsubscricao(){
        $cliente = Cliente::find()->where(['User_id' => Yii::$app->user->identity->getId()])->one();
        $sub = Subscricao::find()->where(['id_cliente' => $cliente->IDCliente])->one();
        if($sub != null){
            $sub->delete();
        }

        $sub = Subscricao::find()->where(['id_cliente' => $cliente->IDCliente])->one();

        return $this->render('inscricao',[
            'cliente' => $cliente,
            'sub' => $sub,
            ]);
    }

    public function actionPagarsubs($iddesconto,$idtipo,$meses,$total,$op){
        $cliente = Cliente::find()->where(['User_id' => Yii::$app->user->identity->getId()])->one();
        $subs = Subscricao::find()->where(['id_cliente' => $cliente->IDCliente])->one();

        if($op == 1){
            $subscricao = new Subscricao();
            $subscricao->id_cliente = $cliente->IDCliente;
            $subscricao->id_desconto = $iddesconto;
            $subscricao->id_tipo = $idtipo;
            $subscricao->data_subscricao = date('Y-m-d',strtotime('Today'));
            $subscricao->data_expirar = date('Y-m-d',strtotime("+" . $meses . " months",strtotime($subscricao->data_subscricao)));
            $subscricao->total = $total;
            $subscricao->save();
        }elseif($op == 2){
            $subs->data_expirar = date('Y-m-d',strtotime("+" . $meses . " months",strtotime($subs->data_expirar)));
            $subs->total = $total;
            $subs->save();
        }
        
        $sub = Subscricao::find()->where(['id_cliente' => $cliente->IDCliente])->one();

        return $this->render('inscricao',[
            'cliente' => $cliente,
            'sub' => $sub,
        ]);
    }
    

    public function actionPt(){

        return $this->render('pedirpt',[

        ]);
    }

    public function actionNutri(){
        return $this->render('pedirnutri',[
            
        ]);
    }
}
