<?php

namespace frontend\models;

use common\models\Funcionario;
use common\models\Planotreino;
use Yii;

/**
 * This is the model class for table "planos_treino".
 *
 * @property int $IDPlanoTreino
 * @property int $id_PT
 * @property string $dia_treino
 * @property string $semana
 *
 * @property ListaPlanos[] $listaPlanos
 * @property Funcionario $pT
 */
class PlanosTreino extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planostreino';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_PT', 'dia_treino', 'semana'], 'required'],
            [['id_PT'], 'integer'],
            [['dia_treino'], 'safe'],
            [['semana'], 'string', 'max' => 255],
            [['id_PT'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['id_PT' => 'IDFuncionario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDPlanoTreino' => 'Id Plano Treino',
            'id_PT' => 'Id Pt',
            'dia_treino' => 'Dia Treino',
            'semana' => 'Semana',
        ];
    }

    /**
     * Gets query for [[ListaPlanos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getListaPlanos()
    {
        return $this->hasMany(ListaPlanos::className(), ['IDPlano' => 'IDPlanoTreino']);
    }

    /**
     * Gets query for [[PT]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPT()
    {
        return $this->hasOne(Funcionario::className(), ['IDFuncionario' => 'id_PT']);
    }

    public function createPlanoTreino()
    {
        $planotreino = new PlanosTreino();
        $funcionario = Funcionario::findOne(['User_id' => Yii::$app->user->id]);

        $planotreino->id_PT = $funcionario->IDFuncionario;
        $planotreino->dia_treino = $this->dia_treino;
        $planotreino->semana = strftime('%V',strtotime($this->dia_treino));

        $planotreino->save();
    }
}
