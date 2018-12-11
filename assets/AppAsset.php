<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700',
        'vendor/nucleo/css/nucleo.css',
        'vendor/@fortawesome/fontawesome-free/css/all.min.css',
        'css/argon.css?v=1.0.0'
    ];
    public $js = [
        'vendor/jquery/dist/jquery.min.js',
        'vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
        'vendor/chart.js/dist/Chart.min.js',
        'vendor/chart.js/dist/Chart.extension.js',
        'js/argon.js?v=1.0.0',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
