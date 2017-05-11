<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanyrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>

<section role="main" class="content-body">
					<header class="page-header">
						<h2>List of <?= Html::encode($this->title) ?></h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><?= Html::encode($this->title) ?></span></li>
								<li><span>Listing</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="#"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">List of All <?= Html::encode($this->title) ?></h2>
							</header>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-md">
											<?= Html::a('Add Company <i class=\"fa fa-plus\"></i>', ['create'], ['class' => 'btn btn-success']) ?>
										</div>
                                        </div>
                                        
								</div>
								
								
								
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sys_company_id',
            'company_name',
            'label_name',
            'custom_label',
            'address_id',
            // 'company_status',
            // 'parent_sys_company_id',
            // 'company_id',
            // 'company_creation_time',
            // 'company_created_by',
            // 'company_updated_time',
            // 'company_updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
								
								
							</div>
						</section>
						
					<!-- end: page -->
				</section>
