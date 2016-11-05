<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // add "createAuto" permission
        $createAuto = $auth->createPermission('createAuto');
        $createAuto->description = 'Create an auto';
        $auth->add($createAuto);

        // add "updateAuto" permission
        $updateAuto = $auth->createPermission('updateAuto');
        $updateAuto->description = 'Update an auto';
        $auth->add($updateAuto);

        // add "deleteAuto" permission
        $deleteAuto = $auth->createPermission('deleteAuto');
        $deleteAuto->description = 'Update an auto';
        $auth->add($deleteAuto);

        // add "sales" role and give this role the "createAuto" permission
        $sales = $auth->createRole('sales');
        $auth->add($sales);
        $auth->addChild($sales, $createAuto);

        // add "admin" role and give this role the "updateAuto" permission
        // as well as the permissions of the "sales" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updateAuto);
        $auth->addChild($admin, $deleteAuto);
        $auth->addChild($admin, $sales);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($sales, 2);
        $auth->assign($admin, 1);
    }
}