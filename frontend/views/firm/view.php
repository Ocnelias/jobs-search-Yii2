<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Firm */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Firms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firm-view">

    <h1><?= Html::encode($this->title) ?></h1>












    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?php
    $attributes = [
            [
            'group' => true,
            'label' => 'Main information',
            'rowOptions' => ['class' => 'info']
        ],
            [
            'attribute' => 'title',
            'value' => $model->title,
        ],
            [
            'group' => true,
            'label' => 'Location',
            'rowOptions' => ['class' => 'info']
        ],
            [
            'attribute' => 'city',
            'value' => $model->city,
        ],
            [
            'group' => true,
            'label' => 'Description',
            'rowOptions' => ['class' => 'info']
        ],
            [
            'attribute' => 'description',
            'label' => '',
            'format' => 'raw',
            'value' => '<span class="text-justify"><em>' . $model->description . '</em></span>',
            'type' => DetailView::INPUT_TEXTAREA,
            'options' => ['rows' => 4]
        ]
    ];
    ?>   



<?=
DetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
    'condensed' => true,
    'hover' => true,
    'mode' => DetailView::MODE_VIEW,
    'enableEditMode' => true,
]);
?>

</div>
