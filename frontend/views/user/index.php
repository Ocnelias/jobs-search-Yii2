<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use yii\helpers\ArrayHelper;
use yii\helpers\url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>



<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>List of resumes</h3> </div>
        <div class="panel-body">
            <div class="user-index">

 <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'options' => ['class' => 'form-inline'],
    ]);
    ?>

   <div class="form-group">
        <?php
        $JobList = ArrayHelper::getColumn($searchModel::find()->all(), 'objective');
        echo TypeaheadBasic::widget([
            'model' => $searchModel,
            'attribute' => 'objective',
            'data' => $JobList,
            'options' => ['placeholder' => 'objective', 'style' => 'margin:5px;width:300px;'],
            'pluginOptions' => ['highlight' => true],
        ]);
        ?>
    </div>


    <div class="form-group">
        <?php
        $cityList = ArrayHelper::getColumn($searchModel::find()->all(), 'city');
        echo TypeaheadBasic::widget([
            'model' => $searchModel,
            'attribute' => 'city',
            'data' => $cityList,
            'options' => ['placeholder' => 'city', 'style' => 'margin:5px;width:300px;'],
            'pluginOptions' => ['highlight' => true],
        ]);
        ?>
    </div> 
    
    
   





    <p class="text-center">


<button type="submit" name="mainsearch" value="mainsearch" class="btn btn-primary"> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Find </button>
    
</p>  


<?php ActiveForm::end(); ?>

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
                        'summary' => "<h4 class=\"add-top text-basic text-muted\"> found resumes: {totalCount}  </h4>",
                        'itemView' => '_index',
                    ])
                    ?>
            </div>
        </div>   
    </div>
</div>


<div class="col-md-3">
<?php echo $this->render('_search', ['model' => $searchModel,'category' => $category]); ?>
   </div>