<?php
namespace common\rbac;

use yii\rbac\Rule;

class FirmAuthorRule extends Rule
{
    public $name = 'isFirmAuthor';

    /**
     * @param string|integer $user ID пользователя.
     * @param Item $item роль или разрешение с которым это правило ассоциировано
     * @param array $params параметры, переданные в ManagerInterface::checkAccess(), например при вызове проверки
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['firm']) ? $params['firm']->user_id == $user : false;
    }
}

