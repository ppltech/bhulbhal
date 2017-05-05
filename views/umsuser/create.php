<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UmsUser */

$this->title = 'Create Ums User';
$this->params['breadcrumbs'][] = ['label' => 'Ums Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ums-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
