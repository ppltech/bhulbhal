<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<?php 
$session = Yii::$app->session;

if(!isset($session['loggedUser'])){
	return Yii::$app->getResponse()->redirect(array('site',));
}else if($session['loggedUser']==''){
	return Yii::$app->getResponse()->redirect(array('site',));
}
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="fixed">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<!-- Vendor CSS -->
		<!-- Head Libs -->
		<script src="<?php echo Yii::getAlias('@web').'/web/assets/'?>/vendor/modernizr/modernizr.js"></script>
		<script type="text/javascript" src="<?php echo Yii::getAlias('@web').'/web/assets/'?>/javascripts/jquery-2.1.1.min.js"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<section class="body">
<!-- header start -->
<link rel="shortcut icon" href="<?php echo Yii::getAlias('@web').'/web/assets/admin/'?>icon/logo.ico" type="image/x-icon"/>
<header class="header">
				<div class="logo-container">
					<a href="<?php echo Yii::$app->homeUrl.'admin'?>" class="logo">
						<img height="45" width="250" alt="Dalmia" src="<?php echo Yii::getAlias('@web').'/web/assets/'?>icon/logo.png">	
                       </a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>	
                        </div>
				</div>
				<!-- start: search & user box -->
				<div class="header-right">
					<span class="separator"></span>
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
				<figure class="profile-picture">
					<img src="<?php echo Yii::getAlias('@web').'/web/assets/'?>/images/!logged-user.png" alt="Admin" class="img-circle" data-lock-picture="assets/images/!logged-user.png" />	
                   </figure>
					<div class="profile-info" data-lock-name="Administrator" data-lock-email="<?php echo 'ADMIN_EMAIL';?>">
								<span class="name"><?php echo 'Administrator';?></span>
								<span class="role"></span></div>
					  <i class="fa custom-caret"></i></a>
					 <div class="dropdown-menu">
                      <ul class="list-unstyled">
                        <li class="test"><?php echo 'email';?></li>
                        <li><a role="menuitem" tabindex="-1" href="<?php echo  Yii::$app->request->baseUrl;?>/admin/administrator/editprofile?id=1"><i class="fa fa-user"></i>  Profile</a></li>
                        <!--<li><a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a></li>-->
                        <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::$app->homeUrl.'site/logoff'?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        
                      </ul>
				     </div>
				  </div>
				</div>
				<!-- end: search & user box -->
		  </header>
<!-- Header END -->
<div class="inner-wrapper">
<!-- left menu start -->
            <aside id="sidebar-left" class="sidebar-left">
             <div class="sidebar-header">
              <div class="sidebar-title">
                Navigation
              </div>
             <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
             </div>
            </div>
				<?php echo \app\components\Menuwidget::widget() ?>
					
			  </aside>
<!-- left menu end -->

<?= $content ?>

</div>
</section>
<?php $this->endBody() ?>
</body>


</html>
<?php $this->endPage() ?>
