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

$this->title = 'Create Firm';
$this->params['breadcrumbs'][] = ['label' => 'Firms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firm-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
