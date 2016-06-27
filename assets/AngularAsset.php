<?php

namespace app\assets;

use yii\web\AssetBundle;

class AngularAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css'
    ];
    public $js = [
        'bower/angular/angular.min.js',
        'js/angular/main.js',
        'js/angular/controllers/VideosController.js',
        'js/angular/services/AppService.js',

    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}