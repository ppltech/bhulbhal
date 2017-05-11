<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;
$modeltitle = <?= $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;
$rawmodelname=<?= $generator->generateString(StringHelper::basename($generator->modelClass)) ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section role="main" class="content-body">
					<header class="page-header">
						<h2>Add <?= "<?= " ?>Html::encode($modeltitle) ?></h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= "<?= " ?>Yii::$app->homeUrl ?>dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><?= "<?= " ?>Html::encode($modeltitle) ?></span></li>
								<li><span><?= "<?= " ?>Html::encode($this->title) ?></span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<div class="row">
									<div class="col-sm-6">
										<div class="mb-md">
											<a href="<?php echo  Yii::$app->request->baseUrl;?>/<?= "<?= " ?>Html::encode(strtolower($rawmodelname)) ?>" class="btn btn-primary">List of <?= "<?= " ?>Html::encode($modeltitle) ?>  </a>
										</div>
                                        </div>
                                        
								</div>
					<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title"><?= "<?= " ?>Html::encode($this->title) ?></h2>
							</header>
    <?= "<?= " ?>$this->render('_form', [
        'model' => $model,
    ]) ?>
</section>
