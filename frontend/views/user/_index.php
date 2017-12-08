<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Job;
?>





<div class="col-md-12">

    <div class="panel panel-default">

        <div class="panel-body">

            <div class="row">

            </div>




            <hr>
            <div id="show_sort"> 

<?php
if ($model->photo != '') {

    $images = array_slice(explode(",", $model->photo), 0, 1);

    echo '<img src="' . current($images) . '" class="img-responsive" > ';
} else {
    echo '<img src="uploads/nophoto.png" class="img-responsive" > ';
}
?> 
    


                <h2>
        
                    
                    <?= Html::a(Html::encode($model->objective), ['view', 'id' => $model->id]) ?>	 <span class="text-muted"><span >&nbsp;</span><span class="nowrap"> <?=Html::encode($model->first_name)?> <?=Html::encode($model->last_name)?>&nbsp; </span></span>
                </h2>

                <div>
                    <span>
                        <?php
                        
                        ?></span>&nbsp;
                    <span class="text-muted ">· </span>
                    <span><?= $model->city ?><span class="text-muted">&nbsp;&middot;&nbsp;</span>
                        <span> posted <?php echo Yii::$app->formatter->format($model->created_at, 'relativeTime') ?>
                        </span>


                </div>

                <div style="word-break: break-all">
                    <div class="text-muted overflow"> 
<?= substr(strip_tags($model->description, '<p><strong> <ul> <li>'), 0, 200) ?>...
                    </div>
                        <?= Html::a('show more <span class="glyphicon glyphicon-chevron-right"></span>', ['view', 'id' => $model->id]) ?>

                </div> 


                <hr><hr>




            </div> </div>


    </div>  </div> 







