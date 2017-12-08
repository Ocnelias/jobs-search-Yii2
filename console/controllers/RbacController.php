<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

/**
 * Инициализатор RBAC выполняется в консоли php yii rbac/init
 */
class RbacController extends Controller {

    public function actionInit() {
        $auth = Yii::$app->authManager;

        $auth->removeAll(); //На всякий случай удаляем старые данные из БД...
        // Создадим роли админа и редактора новостей
        $admin = $auth->createRole('admin');
        $employeer = $auth->createRole('employeer');
        $jobseeker = $auth->createRole('jobseeker');


        // запишем их в БД
        $auth->add($admin);
        $auth->add($employeer);
        $auth->add($jobseeker);

        // Создаем наше правило, которое позволит проверить автора новости
        $FirmAuthorRule = new \common\rbac\FirmAuthorRule;
        $JobAuthorRule = new \common\rbac\JobAuthorRule;
        $ResumeAuthorRule = new \common\rbac\ResumeAuthorRule;

        // Запишем его в БД
        $auth->add($FirmAuthorRule);
        $auth->add($JobAuthorRule);
        $auth->add($ResumeAuthorRule);

        // Создаем разрешения. Например, просмотр админки viewAdminPage и редактирование новости updateNews

        $viewAdminPage = $auth->createPermission('viewAdminPage');
        $viewAdminPage->description = 'view admin page';

        //$updateNews = $auth->createPermission('updateNews');
        //$updateNews->description = 'Редактирование новости';


        $createFirm = $auth->createPermission('createFirm');
        $createFirm->description = 'can create firm';

        $createJob = $auth->createPermission('createJob');
        $createJob->description = 'can create job';

        $createResume = $auth->createPermission('createResume');
        $createResume->description = 'can create resume';

        $updateOwnFirm = $auth->createPermission('updateOwnFirm');
        $updateOwnFirm->description = 'update own firm';
       
        $updateOwnJob = $auth->createPermission('updateOwnJob');
        $updateOwnJob->description = 'update own job';
        
        $updateOwnResume = $auth->createPermission('updateOwnResume');
        $updateOwnResume->description = 'update own resume';


        $update = $auth->createPermission('update');
        $update->description = 'update all';


        $updateOwnFirm->ruleName = $FirmAuthorRule->name;
        $updateOwnJob->ruleName = $JobAuthorRule->name;
        $updateOwnResume->ruleName = $ResumeAuthorRule->name;

        // Запишем эти разрешения в БД
        $auth->add($viewAdminPage);
        $auth->add($createFirm);
        $auth->add($createJob);
        $auth->add($createResume);
        $auth->add($updateOwnFirm);
        $auth->add($updateOwnJob);
        $auth->add($updateOwnResume);
        $auth->add($update);

        // Теперь добавим наследования. Для роли editor мы добавим разрешение updateNews,
        // а для админа добавим наследование от роли editor и еще добавим собственное разрешение viewAdminPage
        // Роли «Редактор новостей» присваиваем разрешение «Редактирование новости»
        $auth->addChild($employeer, $createFirm);
        $auth->addChild($employeer, $createJob);
        $auth->addChild($employeer, $updateOwnFirm);
        $auth->addChild($employeer, $updateOwnJob);

        $auth->addChild($jobseeker, $createResume);
        $auth->addChild($jobseeker, $updateOwnResume);

        // админ наследует роль редактора новостей. Он же админ, должен уметь всё! :D

        $auth->addChild($admin, $jobseeker);
        $auth->addChild($admin, $employeer);

        // Еще админ имеет собственное разрешение - «Просмотр админки»
        $auth->addChild($admin, $viewAdminPage);
        $auth->addChild($admin, $update);


        // Назначаем роль admin пользователю с ID 1
        $auth->assign($admin, 1);

        // Назначаем роль editor пользователю с ID 2
        $auth->assign($employeer, 2);

        $auth->assign($jobseeker, 3);
    }

}
