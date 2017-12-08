<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use yii\helpers\ArrayHelper;
use yii\helpers\url;

/* @var $this yii\web\View */
/* @var $model common\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>




    <h4>Filter by: </h4> <hr>


  

    <div class="form-group">
<?= $form->field($category, 'category')->dropDownList(ArrayHelper::map($category::find()->all(), 'category', 'category'), ['prompt' => 'category'])->label('Category') ?>

    </div>
    
  
     <div class="form-group">
    <?= $form->field($model, 'education_qualification')->dropDownList(
     $model->education_select,  ['prompt'=>'education']); ?>
    </div>
    
    
    
    <div class="form-group">
    <?= $form->field($model, 'employment_type')->dropDownList($model->education_select,  ['prompt'=>'choose employment type']); ?>
    </div>


 



    <div class="form-inline">
 <b> Salary requirements</b><br>
 <?= $form->field($model, 'min_price')->textInput()->input('min_price', ['placeholder' => "from",'style' => 'margin:5px;width:70px;'])->label(false) ?>	   

<?= $form->field($model, 'max_price')->textInput()->input('max_price', ['placeholder' => "to",'style' => 'margin:5px;width:70px;'])->label(false) ?>	   
 
    </div>




</div>






<?php // echo $form->field($model, 'email') ?>

<?php // echo $form->field($model, 'contact_email') ?>

<?php // echo $form->field($model, 'objective') ?>

<?php // echo $form->field($model, 'salary') ?>

<?php // echo $form->field($model, 'employment_type') ?>

<?php // echo $form->field($model, 'first_name') ?>

<?php // echo $form->field($model, 'last_name') ?>

<?php // echo $form->field($model, 'photo') ?>

<?php // echo $form->field($model, 'city') ?>

<?php // echo $form->field($model, 'sex') ?>

<?php // echo $form->field($model, 'phone') ?>

<?php // echo $form->field($model, 'birth') ?>

<?php // echo $form->field($model, 'education_qualification') ?>

<?php // echo $form->field($model, 'education_occupation') ?>

<?php // echo $form->field($model, 'education_university') ?>

<?php // echo $form->field($model, 'education_from_month') ?>

<?php // echo $form->field($model, 'education_from_year') ?>

<?php // echo $form->field($model, 'education_to_month') ?>

<?php // echo $form->field($model, 'education_to_year') ?>

<?php // echo $form->field($model, 'public') ?>

<?php // echo $form->field($model, 'description') ?>

<?php // echo $form->field($model, 'status') ?>

<?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at')  ?>

<div class="form-group">
<?= Html::submitButton('Filter', ['class' => 'btn btn-primary']) ?>
<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>

