<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\User */


$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];

?>
<div class="user-create">

  

    <?= $this->render('_form', [
        'model' => $model,
        'experience' => $experience,
    ]) ?>

</div>
