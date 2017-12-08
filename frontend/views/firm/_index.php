<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Firm;
?>

<div class="col-md-12">

    <div class="panel panel-default">

        <div class="panel-body">

            <div class="row">

            </div>

            <hr>
            <div id="show_sort"> 



                <h2>
                    <img src="" width="64" height="64" />

                    <?= Html::a(Html::encode($model->title), ['view', 'id' => $model->id]) ?>	
                </h2>

           

                <div style="word-break: break-all">
                    <div class="text-muted overflow"> 
                        <?= substr(strip_tags($model->description, '<p><strong> <ul> <li>'), 0, 200) ?>...
                    </div>
                    <?= Html::a('show more <span class="glyphicon glyphicon-chevron-right"></span>', ['view', 'id' => $model->id]) ?>

                </div> 


                <hr><hr>




            </div> </div>


    </div>  </div> 








