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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
    		
    		'assets/vendor/bootstrap/css/bootstrap.css',
    		'assets/vendor/font-awesome/css/font-awesome.css',
    		'assets/vendor/magnific-popup/magnific-popup.css',
    		'assets/vendor/bootstrap-datepicker/css/datepicker3.css',
    		'assets/vendor/select2/select2.css',
    		'assets/vendor/jquery-datatables-bs3/assets/css/datatables.css',
    		'assets/stylesheets/theme.css',
    		'assets/stylesheets/skins/default.css',
    		'assets/stylesheets/theme-custom.css'
    ];
    public $js = [
    		//'assets/vendor/modernizr/modernizr.js',
    		'assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js',
    		'assets/vendor/bootstrap/js/bootstrap.js',
    		'assets/vendor/nanoscroller/nanoscroller.js',
    		'assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js',
    		'assets/vendor/magnific-popup/magnific-popup.js',
    		'assets/vendor/jquery-placeholder/jquery.placeholder.js',
    		'assets/vendor/select2/select2.js',
    		'assets/vendor/jquery-datatables/media/js/jquery.dataTables.js',
    		'assets/vendor/jquery-datatables-bs3/assets/js/datatables.js',
    		'assets/javascripts/theme.js',
    		'assets/javascripts/theme.custom.js',
    		'assets/javascripts/theme.init.js',
    		'assets/javascripts/tables/examples.datatables.default.js',
    		'assets/javascripts/tables/examples.datatables.row.with.details.js',
    		'assets/javascripts/tables/examples.datatables.tabletools.js',
    ];
    public $depends = [
    		
        	'yii\web\YiiAsset',
        	//'yii\bootstrap\BootstrapAsset',
    ];
}
