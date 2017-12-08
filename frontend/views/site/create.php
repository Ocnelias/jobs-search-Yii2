<?php

use yii\helpers\Html;
use common\models\Firm;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = 'Create Job';
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


 
     echo  $countUserFirm;
?>
<div class="job-create">

    <h1><?= Html::encode($this->title) ?></h1>


    
    
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
