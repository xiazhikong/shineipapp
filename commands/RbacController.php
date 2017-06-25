<?php
/**
 * User: Mr-mao
 * Date: 2017/6/19
 * Time: 16:56
 */

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        /**
         $auth = Yii::$app->authManager;
         if (!is_dir('rbac/')) mkdir('rbac/');
         is_file($auth->assignmentFile)?:touch($auth->assignmentFile);
         is_file($auth->itemFile)?:touch($auth->itemFile);
         is_file($auth->ruleFile)?:touch($auth->ruleFile);
         $auth->removeAll();

         $create = $auth->createPermission('createPatent');
         $create->description = 'create a patent';
         $auth->add($create);

         $update = $auth->createPermission('updatePatent');
         $update->description = 'Update patent';
         $auth->add($update);

         $author = $auth->createRole('author');
         $auth->add($author);
         $auth->addChild($author, $create);

         $admin = $auth->createRole('admin');
         $auth->add($admin);
         $auth->addChild($admin, $update);
         $auth->addChild($admin, $author);

         $auth->assign($author, 2);
         $auth->assign($admin, 1);
         */

    }
}
