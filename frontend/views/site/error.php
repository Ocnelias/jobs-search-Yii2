<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
?>
<div class="site-error">


<?php if($exception->statusCode == '404') { ?>

   <div class="alert alert-danger">
<?= nl2br(Html::encode($message)) ?>
   

    </div>

<?php }  else { ?>

   <div class="alert alert-danger">
<?= nl2br(Html::encode($message)) ?>.
      
        <?=
        $menuItems[] = ''
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        ;
        ?>

    </div>

<?php } ?>   
   
    
    

</div>
