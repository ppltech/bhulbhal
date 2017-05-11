<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = $model->sys_company_id;
$modeltitle = 'Company';
$rawmodelname='Company';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

   


<section role="main" class="content-body">
					<header class="page-header">
						<h2>View <?= Html::encode($modeltitle) ?></h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= Yii::$app->homeUrl ?>dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><?= Html::encode($modeltitle) ?></span></li>
								<li><span>View</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<div class="row">
									<div class="col-sm-6">
										<div class="mb-md">
										<?= Html::a('Update', ['update', 'id' => $model->sys_company_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sys_company_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
											<a href="/UMS/<?= Html::encode(strtolower($rawmodelname)) ?>" class="btn btn-primary">List of <?= Html::encode($modeltitle) ?></a>
										</div>
                                        </div>
                                        
								</div>
					<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						<h2 class="panel-title">Update <?= Html::encode($modeltitle) ?></h2>
								
							</header>
							<div class="row">
						
						<div class="col-md-12">
   <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sys_company_id',
            'company_name',
            'label_name',
            'custom_label',
            'address_id',
            'company_status',
            'parent_sys_company_id',
            'company_id',
            'company_creation_time',
            'company_created_by',
            'company_updated_time',
            'company_updated_by',
        ],
    ]) ?>
    </div>
						<!-- col-md-6 -->
						
					</div>
</section>

