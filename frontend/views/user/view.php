<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'contact_email:email',
            'objective',
            'salary',
            'employment_type',
            'first_name',
            'last_name',
            'photo',
            'city',
            'sex',
            'phone',
            'birth',
            'education_qualification',
            'education_occupation',
            'education_university',
            'education_from_month',
            'education_from_year',
            'education_to_month',
            'education_to_year',
            'public',
            'description:ntext',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
