<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\UmsAsset;

UmsAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
								<a href="http://peopleproconsultants.com/ppltech/ums/" class="navbar-brand hidden-xs hidden-sm"><img src="http://peopleproconsultants.com/ppltech/ums/images/ppl-logo.jpg" style="width: 290px;"></a>
				<a href="http://peopleproconsultants.com/ppltech/ums/" class="navbar-brand hidden-md hidden-lg"><img src="http://peopleproconsultants.com/ppltech/ums/images/ppl-logo.jpg" style="width: 200px;margin-top: -6px;"></a>
			</div>

			<div class="collapse navbar-collapse" id="menubar" style="max-height: 500px; min-height:72px;">
				
							</div>
		</div>
	</nav>
</header>

<?= $content ?>
<footer class="container-fluid">
		<div class="row">
			<div id="status-bar" class="hidden-xs col-sm-6 small"></div>
			<div id="copyright-strip" class="col-xs-12 col-sm-6 small">Powered by&nbsp;<a href="#" target="_blank">PeoplePro Technologies</a></div>
		</div>
	</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
