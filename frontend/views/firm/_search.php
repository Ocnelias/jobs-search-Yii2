<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FirmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="firm-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>



    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'city') ?>

    <?= $form->field($model, 'category') ?>

 

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'show_website') ?>

    <?php // echo $form->field($model, 'show_email') ?>

    <?php // echo $form->field($model, 'show_phone') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
