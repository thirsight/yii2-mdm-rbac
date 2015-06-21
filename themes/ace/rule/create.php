<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var mdm\rbac\models\AuthItem $model
 */

$this->title = Yii::t('rbac-admin', 'Create Rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">

	<?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
