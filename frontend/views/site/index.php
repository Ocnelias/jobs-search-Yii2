<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Find your job</h3> </div>
        <div class="panel-body">
            <div class="job-index">

                <h1><?= Html::encode($this->title) ?></h1>
<?php echo $this->render('_search', ['model' => $searchModel, 'category' => $category, 'city' => $city]); ?>

                <p>
<?php
//Html::a('Create Job', ['create'], ['class' => 'btn btn-success']) 
?>
                </p>
                    <?=
                    ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemOptions' => ['class' => 'item'],
                        'layout' => "{items}\n{summary}\n{sorter}\n{pager}",
                         'sorter' => [
                        'class' => 'rsr\yii2\ButtonDropdownSorter',
                        'label' => 'Sort by',
                        'attributes' => [
                            'salary',
                            'created_at',
                        ],
                    ],
                        'summary' => "<h4 class=\"add-top text-basic text-muted\"> found positions: {totalCount}  </h4>",
                        'itemView' => '_index',
                    ])
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