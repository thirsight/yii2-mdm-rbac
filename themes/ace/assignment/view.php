<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yii\web\IdentityInterface */

$this->title  = Yii::t('rbac-admin', 'User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->title = $this->title . ': ' . $model->$usernameField;
?>
    <div class="row assignment-index">

        <div class="col-lg-5">
            <div class="form-group">
                <?= Html::textInput('search_av', '', ['class' => 'role-search form-control', 'data-target' => 'avaliable', 'placeholder' => Yii::t('rbac-admin', 'Search avaliable')]) ?>
            </div>
            <div class="form-group">
                <?php
                echo Html::listBox('roles', '', $avaliable, [
                    'id' => 'avaliable',
                    'multiple' => true,
                    'size' => 20,
                    'class' => 'form-control']);
                ?>
            </div>
        </div>
        <div class="col-lg-2 text-center">
            <?php
            echo Html::a('>>', '#', ['class' => 'btn btn-success', 'data-action' => 'assign']) . '<br>';
            echo Html::a('<<', '#', ['class' => 'btn btn-success', 'data-action' => 'delete']) . '<br>';
            ?>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <?= Html::textInput('search_asgn', '', ['class' => 'role-search form-control', 'data-target' => 'assigned', 'placeholder' => Yii::t('rbac-admin', 'Search assigned')]) ?>
            </div>
            <div class="form-group">
                <?php
                echo Html::listBox('roles', '', $assigned, [
                    'id' => 'assigned',
                    'multiple' => true,
                    'size' => 20,
                    'class' => 'form-control']);
                ?>
            </div>
        </div>

    </div>
<?php
$this->render('_script',['id'=>$model->{$idField}]);
