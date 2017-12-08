<?php

use kartik\typeahead\TypeaheadBasic;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JobSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'options' => ['class' => 'form-inline'],
    ]);
    ?>

    <div class="form-group">
        <?php
        $JobList = ArrayHelper::getColumn($model::find()->all(), 'position');
        echo TypeaheadBasic::widget([
            'model' => $model,
            'attribute' => 'position',
            'data' => $JobList,
            'options' => ['placeholder' => 'start typing the job', 'style' => 'margin:5px;width:300px;'],
            'pluginOptions' => ['highlight' => true],
        ]);
        ?>
    </div>


    <div class="form-group">
        <?php
        $cityList = ArrayHelper::getColumn($city::find()->all(), 'city');
        echo TypeaheadBasic::widget([
            'model' => $model,
            'attribute' => 'city',
            'data' => $cityList,
            'options' => ['placeholder' => 'start typing the city', 'style' => 'margin:5px;width:300px;'],
            'pluginOptions' => ['highlight' => true],
        ]);
        ?>
    </div> <br>
    <p class="text-center">
        <a class="accordion-toggle text-center"  data-toggle="collapse" href="#collapse">  <span class=""></span>Advanced search</a>
    </p>  
    <div id="collapse" class="panel-collapse collapse">

        <div class="form-group form-inline"> 
            <p class="text-center">
                
<?= $form->field($model, 'min_price')->textInput()->input('min_price', ['placeholder' => "salary from"])->label(false) ?>	   

<?= $form->field($model, 'max_price')->textInput()->input('max_price', ['placeholder' => "salary to"])->label(false) ?>	   
 
<?= $form->field($category, 'category')->dropDownList(ArrayHelper::map($category::find()->all(), 'category', 'category'),  ['prompt'=>'category'])->label('') ?>
            
            </p>

        </div>


        <div class="form-group form-inline"> 

<?= $form->field($model, 'employment_type')->dropDownList(ArrayHelper::map($model::find()->all(), 'employment_type', 'employment_type'),  ['prompt'=>'employment type'])->label('') ?>
<?= $form->field($model, 'experience')->dropDownList(ArrayHelper::map($model::find()->all(), 'experience', 'experience'),  ['prompt'=>'experience'])->label('') ?>
<?= $form->field($model, 'education')->dropDownList(ArrayHelper::map($model::find()->all(), 'education', 'education'),  ['prompt'=>'education'])->label('') ?>

        </div>




    </div>     





    <p class="text-center">


<button type="submit" name="mainsearch" value="mainsearch" class="btn btn-primary"> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Find </button>
    
</p>  


<?php ActiveForm::end(); ?>

</div>
