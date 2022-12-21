<?php

namespace app\assets;

use yii\web\AssetBundle;

class ChartJsAssetBundle extends AssetBundle
{
    public $sourcePath = '@bower/chart.js';

    public $js = [
        'dist/chart.umd.js',
    ];

    public $jsOptions = [
        'type' => 'module'
    ];

    public function init()
    {
        parent::init();
    }
}