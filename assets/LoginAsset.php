<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
			'http://peopleproconsultants.com/ppltech/ums/css/bootstrap.min.css',
			'http://peopleproconsultants.com/ppltech/ums/css/bootstrap-select.min.css',
			'http://peopleproconsultants.com/ppltech/ums/css/bootstrap-toggle.min.css',
			'http://peopleproconsultants.com/ppltech/ums/css/jquery-ui.min.css',
			'http://peopleproconsultants.com/ppltech/ums/css/jquery-ui.structure.min.css',
			'http://peopleproconsultants.com/ppltech/ums/css/jquery-ui.theme.min.css',
			'http://peopleproconsultants.com/ppltech/ums/css/metro-ui.css',
			'http://peopleproconsultants.com/ppltech/ums/css/font-awesome.min.css',
			'http://peopleproconsultants.com/ppltech/ums/css/styles.css',
			'http://peopleproconsultants.com/ppltech/ums/css/nav.css',
			
			
	];
	public $js = [
			
			'http://peopleproconsultants.com/ppltech/ums/js/bootstrap.min.js',
			'http://peopleproconsultants.com/ppltech/ums/js/bootstrap-toggle.min.js',
			'http://peopleproconsultants.com/ppltech/ums/js/sidr.min.js',
			'http://peopleproconsultants.com/ppltech/ums/js/touchwipe.min.js',
			'http://peopleproconsultants.com/ppltech/ums/js/password-visibility-toggler.js',
			'http://peopleproconsultants.com/ppltech/ums/js/all-checkbox-selector.js',
			'http://peopleproconsultants.com/ppltech/ums/js/height-and-margin.js',
			'http://peopleproconsultants.com/ppltech/ums/js/bootstrap-filestyle.min.js',
			'http://peopleproconsultants.com/ppltech/ums/js/validation.js',
			
	];
	public $depends = [
			
			//'yii\web\YiiAsset',
			//'yii\bootstrap\BootstrapAsset',
	];
}
