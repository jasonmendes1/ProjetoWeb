<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "planosnutricao".
 *
 * @property int $IDPlanoNutricao
 * @property int|null $Segunda
 * @property int|null $Terca
 * @property int|null $Quarta
 * @property int|null $Quinta
 * @property int|null $Sexta
 * @property int|null $Sabado
 * @property int $IDNutricionista
 * @property string $Semana
 *
 * @property ListaPlanos[] $listaPlanos
 * @property Ementa $segunda
 * @property Ementa $terca
 * @property Ementa $quarta
 * @property Ementa $quinta
 * @property Ementa $sexta
 * @property Ementa $sabado
 * @property Funcionario $iDNutricionista
 */
class Planosnutricao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planosnutricao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Segunda', 'Terca', 'Quarta', 'Quinta', 'Sexta', 'Sabado', 'IDNutricionista'], 'integer'],
            [['IDNutricionista', 'Semana'], 'required'],
            [['Semana'], 'string', 'max' => 10],
            [['Segunda'], 'exist', 'skipOnError' => true, 'targetClass' => Ementa::className(), 'targetAttribute' => ['Segunda' => 'IDEmenta']],
            [['Terca'], 'exist', 'skipOnError' => true, 'targetClass' => Ementa::className(), 'targetAttribute' => ['Terca' => 'IDEmenta']],
            [['Quarta'], 'exist', 'skipOnError' => true, 'targetClass' => Ementa::className(), 'targetAttribute' => ['Quarta' => 'IDEmenta']],
            [['Quinta'], 'exist', 'skipOnError' => true, 'targetClass' => Ementa::className(), 'targetAttribute' => ['Quinta' => 'IDEmenta']],
            [['Sexta'], 'exist', 'skipOnError' => true, 'targetClass' => Ementa::className(), 'targetAttribute' => ['Sexta' => 'IDEmenta']],
            [['Sabado'], 'exist', 'skipOnError' => true, 'targetClass' => Ementa::className(), 'targetAttribute' => ['Sabado' => 'IDEmenta']],
            [['IDNutricionista'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['IDNutricionista' => 'IDFuncionario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDPlanoNutricao' => 'Id Plano Nutricao',
            'Segunda' => 'Segunda',
            'Terca' => 'Terca',
            'Quarta' => 'Quarta',
            'Quinta' => 'Quinta',
            'Sexta' => 'Sexta',
            'Sabado' => 'Sabado',
            'IDNutricionista' => 'Id Nutricionista',
            'Semana' => 'Semana',
        ];
    }

    /**
     * Gets query for [[ListaPlanos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getListaPlanos()
    {
        return $this->hasMany(ListaPlanos::className(), ['IDPlanoNutricao' => 'IDPlanoNutricao']);
    }

    /**
     * Gets query for [[Segunda]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSegunda()
    {
        return $this->hasOne(Ementa::className(), ['IDEmenta' => 'Segunda']);
    }

    /**
     * Gets query for [[Terca]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTerca()
    {
        return $this->hasOne(Ementa::className(), ['IDEmenta' => 'Terca']);
    }

    /**
     * Gets query for [[Quarta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuarta()
    {
        return $this->hasOne(Ementa::className(), ['IDEmenta' => 'Quarta']);
    }

    /**
     * Gets query for [[Quinta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuinta()
    {
        return $this->hasOne(Ementa::className(), ['IDEmenta' => 'Quinta']);
    }

    /**
     * Gets query for [[Sexta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSexta()
    {
        return $this->hasOne(Ementa::className(), ['IDEmenta' => 'Sexta']);
    }

    /**
     * Gets query for [[Sabado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSabado()
    {
        return $this->hasOne(Ementa::className(), ['IDEmenta' => 'Sabado']);
    }

    /**
     * Gets query for [[IDNutricionista]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDNutricionista()
    {
        return $this->hasOne(Funcionario::className(), ['IDFuncionario' => 'IDNutricionista']);
    }

    public function createPlanoNutricao()
    {
        $planonutricao = new PlanosNutricao();
        $funcionario = Funcionario::findOne(['User_id' => Yii::$app->user->id]);

        $planonutricao->Segunda = $this->Segunda;
        $planonutricao->Terca = $this->Terca;
        $planonutricao->Quarta = $this->Quarta;
        $planonutricao->Quinta = $this->Quinta;
        $planonutricao->Sexta = $this->Sexta;
        $planonutricao->Sabado = $this->Sabado;
        $planonutricao->Semana = strftime('%V',strtotime($this->Semana));

        $planonutricao->IDNutricionista = $funcionario->IDFuncionario;

        $planonutricao->save();
    }

}
