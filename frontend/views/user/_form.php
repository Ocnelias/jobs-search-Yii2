<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\typeahead\TypeaheadBasic;
use kartik\date\DatePicker;
use kartik\daterange\DateRangePicker;
use common\models\City;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Create new resume</h3> </div>
        <div class="panel-body">



            <div class="firm-form">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <div class="panel panel-info">
                    <div class="panel-heading">Main information</div>
                    <div class="panel-body">
                        <div class="form-group "> 
                            <?= $form->field($model, 'objective')->textInput() ?>
                        </div> 

                        <div class="form-group "> 
                            <?= $form->field($model, 'salary')->textInput() ?>
                        </div> 

                        <div class="form-group">
                            <?= $form->field($model, 'employment_type')->dropDownList($model->employment_select, ['prompt' => 'choose employment type']); ?>
                        </div>


                    </div>

                    <div class="panel-heading">Personal Information</div>
                    <div class="panel-body">

                        <div class="form-group "> 
                            <?= $form->field($model, 'first_name')->textInput() ?>
                        </div>

                        <div class="form-group "> 
                            <?= $form->field($model, 'last_name')->textInput() ?>
                        </div>

                        <div class="form-group "> 

                            <?php
                            echo $form->field($model, 'photo')->widget(FileInput::classname(), [
                                'options' => ['multiple' => false]
                            ]);
                            ?>

                        </div>  

                        <div class="form-group "> 
                            <?= $form->field($model, 'city')->textInput() ?>
                        </div>
                        <div class="form-group"> 
                            <label>Birth Date  </label>
                            <?php
                            echo DatePicker::widget([
                                'name' => 'birth',
                                'type' => DatePicker::TYPE_INPUT,
                                'value' => '',
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'dd-M-yyyy'
                                ]
                            ]);
                            ?>
                        </div>

                    </div>




                    <div class="panel-heading">Contacts</div>
                    <div class="panel-body">
                        <div class="form-group "> 
                            <?= $form->field($model, 'email')->textInput() ?>
                        </div>

                        <div class="form-group "> 
                            <?= $form->field($model, 'phone')->textInput() ?>
                        </div>
                    </div>

                    <div class="panel-heading">Education</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <?=
                            $form->field($model, 'education_qualification')->dropDownList(
                                    $model->education_select, ['prompt' => 'education']);
                            ?>
                        </div>
                        <div class="form-group "> 
                            <?= $form->field($model, 'education_occupation')->textInput() ?>
                        </div>

                        <div class="form-group "> 
                            <?= $form->field($model, 'education_university')->textInput() ?>
                        </div>

                        <div class="form-group"> 
                            <label> Date  </label>
                            <?php
                            echo DatePicker::widget([
                                'name' => 'education_from_month',
                                'value' => 'begin date',
                                'type' => DatePicker::TYPE_RANGE,
                                'name2' => 'education_to_month',
                                'value2' => 'end date',
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'mm-yyyy'
                                ]
                            ]);
                            ?>
                        </div>




                    </div>

                    <div class="panel-heading">Experience</div>
                    <div class="panel-body">

                        <div class="form-group "> 
                            <?= $form->field($experience, 'title')->textInput() ?>
                        </div>
                        <div class="form-group "> 
                            <?= $form->field($experience, 'company')->textInput() ?>
                        </div>


                        <div class="form-group"> 
                            <label> Date  </label>
                            <?php
                            echo DatePicker::widget([
                                'name' => 'date_from',
                                'value' => 'begin date',
                                'type' => DatePicker::TYPE_RANGE,
                                'name2' => 'date_to',
                                'value2' => 'end date',
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'mm-yyyy'
                                ]
                            ]);
                            ?>
                        </div>                

                        <div class="form-group "> 
                            <?= $form->field($experience, 'description')->textarea() ?>
                        </div>
                    </div>


                    <div class="panel-heading">About yourself</div>
                    <div class="panel-body">
                        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                    </div>

                </div> 



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