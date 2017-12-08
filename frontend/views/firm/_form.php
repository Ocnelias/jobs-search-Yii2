<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use kartik\typeahead\TypeaheadBasic;
use common\models\City;

/* @var $this yii\web\View */
/* @var $model common\models\Firm */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Company Details</h3> </div>
        <div class="panel-body">



            <div class="firm-form">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <div class="panel panel-info">
                    <div class="panel-heading">Main information</div>
                    <div class="panel-body">
                        <div class="form-group "> 
                            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                        </div> 

                        <div class="form-group "> 

                            <?php
                            echo $form->field($model, 'logo')->widget(FileInput::classname(), [
                                'options' => ['multiple' => false]
                            ]);
                            ?>

                        </div>   
                    </div>
                </div> 

                <div class="panel panel-info">
                    <div class="panel-heading">Location</div>
                    <div class="panel-body">
                        <div class="form-group"> 

                            <?php
                            $cityList = ArrayHelper::getColumn(City::find()->all(), 'city');
                            echo TypeaheadBasic::widget([
                                'model' => $model,
                                'attribute' => 'city',
                                'data' => $cityList,
                                'options' => ['placeholder' => 'start typing the city', 'style' => 'margin:5px;width:300px;'],
                                'pluginOptions' => ['highlight' => true],
                            ]);
                            ?>


                        </div> 
                    </div>
                </div> 

                <div class="panel panel-info">
                    <div class="panel-heading">Contacts</div>
                    <div class="panel-body">
                        <div class="form-group"> 

                            <div class="form-inline"> 
                                <?= $form->field($model, 'website')->textInput() ?>
                                &nbsp; &nbsp;
                                <?= $form->field($model, 'show_website')->checkbox() ?>

                            </div>

                            <div class="form-inline"> 
                                <?= $form->field($model, 'email')->textInput() ?>
                                &nbsp; &nbsp;  &nbsp; &nbsp;
                                <?= $form->field($model, 'show_email')->checkbox() ?>

                            </div>

                            <div class="form-inline"> 
                                <?= $form->field($model, 'phone')->textInput() ?>
                                &nbsp; &nbsp;
                                <?= $form->field($model, 'show_phone')->checkbox() ?>

                            </div>
                        </div> 
                    </div>
                </div> 





                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                <div class="form-group"> 
                    <?= $form->field($model, 'agree')->checkbox()->label('Accept <a href="">  the Terms and Conditions </a>'); ?>

                </div> 

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>

        </div>
    </div>
</div>