<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'avatar')->fileInput() ?>

                <?= $form->field($model, 'primeiroNome')->textInput(['autofocus' => true]) ?>
                
                <?= $form->field($model, 'apelido')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model,'dt_nascimento')->widget(DatePicker::className(),['dateFormat' => 'y-M-d']) ?>

                <?= $form->field($model, 'sexo')->dropDownList(['a' =>'Selecionar Sexo...','b' => 'Masculino', 'c' => 'Feminino']) ?>

                <?= $form->field($model, 'num_tele')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'nif')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
