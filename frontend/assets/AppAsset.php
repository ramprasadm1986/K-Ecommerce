<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@frontendUrl';
    public $css = [
        'css/site.css',
		'css/owl.carousel.min.css',
		'css/slick.css',
		'css/font-awesome.css',
		'css/slick-theme.css',
		'css/owl.theme.default.min.css',
		'css/styles.css',
		'https://fonts.googleapis.com/css?family=Poppins:400,500,700',
		'https://fonts.googleapis.com/css?family=Roboto:400,500,700',
		'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,400;1,600&display=swap'
    ];
    public $js = [
		'js/owl.carousel.min.js',
		'js/slick.min.js',
		'js/countdown.js',
		'js/main.js',
		'js/cart.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
