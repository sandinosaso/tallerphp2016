<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View              $this
 * @var dektrium\user\models\User $user
 * @var dektrium\user\Module      $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Registration</p>

        <?php $form = ActiveForm::begin([
            'id'                     => 'registration-form',
            'enableAjaxValidation'   => true,
            'enableClientValidation' => false,
        ]); ?>

        <?= $form->field($model, 'email') ?>

        <?php if ($module->enableGeneratingPassword == false): ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
        <?php endif ?>

        <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>

        <?php ActiveForm::end(); ?>

        <?php var_dump($model->getErrors()); ?>
    </div>
    <p class="text-center">
        <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
    </p>
</div>