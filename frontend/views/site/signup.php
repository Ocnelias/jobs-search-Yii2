<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="col-md-8">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li><a href="#jobseeker" data-toggle="tab">Register as a Jobseeker</a></li>
        <li><a href="#employer" data-toggle="tab">Register as an Employeer</a></li>

    </ul>
</div>
<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane" id="jobseeker">


        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">  Register as a Jobseeker </div>
                        <div class="panel-body">

                            <p>Please fill out the following fields to signup:</p>

                            <div class="row">
                                <div class="col-lg-5">
<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                                    <?= $form->field($model, 'email') ?>

                                    <?= $form->field($model, 'password')->passwordInput() ?>

                                    <input type="hidden" name="role" value="jobseeker">
                                    <div class="form-group">
<?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                                    </div>

                                        <?php ActiveForm::end(); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="employer">


        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">  Register as an Employer </div>
                        <div class="panel-body">

                            <p>Please fill out the following fields to signup:</p>

                            <div class="row">
                                <div class="col-lg-5">
<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                                    <?= $form->field($model, 'email') ?>

                                    <?= $form->field($model, 'password')->passwordInput() ?>

                                    <input type="hidden" name="role" value="employeer">
                                    <div class="form-group">
<?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                                    </div>

                                        <?php ActiveForm::end(); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   

</div>


