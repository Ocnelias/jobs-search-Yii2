<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FirmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>






<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>List of companies</h3> </div>
        <div class="panel-body">
            <div class="firm-index">


<?=
ListView::widget([
    'dataProvider' => $dataProvider,
    'itemOptions' => ['class' => 'item'],
    'layout' => "{items}\n{summary}\n{pager}",
    'summary' => "<h4 class=\"add-top text-basic text-muted\"> found positions: {totalCount}  </h4>",
    'itemView' => '_index',
])
?>
                <?php
                if (\Yii::$app->user->can('createFirm')) {
                    echo Html::a('Add your company', ['create'], ['class' => 'btn btn-success']);
                }
                ?>  
            </div>
        </div>   
    </div>
</div>


<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Top companies</h3> </div>
        <div class="panel-body">


        </div>
    </div>
</div>