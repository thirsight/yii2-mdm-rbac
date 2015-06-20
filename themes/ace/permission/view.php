<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\AuthItem */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Permissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="auth-item-view">
        <div class="form-group">
            <?= Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
            <?php
            echo Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->name], [
                'class' => 'btn btn-danger',
                'data-confirm' => Yii::t('rbac-admin', 'Are you sure to delete this item?'),
                'data-method' => 'post',
            ]);
            ?>
        </div>

        <?php
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'description:ntext',
                'ruleName',
                'data:ntext',
            ],
        ]);
        ?>

        <div class="row">
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
    </div>
<?php
$this->render('_script',['name'=>$model->name]);
