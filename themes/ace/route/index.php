<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 */
$this->title = Yii::t('rbac-admin', 'Routes');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="form-group">
        <?= Html::a(Yii::t('rbac-admin', 'Create route'), ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <div class="form-group input-group">
                <?= Html::textInput('search_av', '', ['class' => 'role-search form-control', 'data-target' => 'new', 'placeholder' => Yii::t('rbac-admin', 'Search avaliable')]) ?>
                <span class="input-group-addon">
                    <?= Html::a('<span class="glyphicon glyphicon-refresh"></span>', '', ['id'=>'btn-refresh', 'title' => 'refresh']) ?>
                </span>
            </div>
            <div class="form-group">
                <?php
                echo Html::listBox('routes', '', $new, [
                    'id' => 'new',
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
                <?= Html::textInput('search_asgn', '', ['class' => 'role-search form-control', 'data-target' => 'exists', 'placeholder' => Yii::t('rbac-admin', 'Search assigned')]) ?>
            </div>
            <div class="form-group">
                <?php
                echo Html::listBox('routes', '', $exists, [
                    'id' => 'exists',
                    'multiple' => true,
                    'size' => 20,
                    'class' => 'form-control',
                    'options' => $existsOptions]);
                ?>
            </div>
        </div>
    </div>
<?php
$this->render('_script');
