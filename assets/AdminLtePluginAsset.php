<?php
/**
 * User: Mr-mao
 * Date: 2017/6/26
 * Time: 16:56
 */

namespace app\assets;

use yii\web\AssetBundle;
class AdminLtePluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $js = [
        'iCheck/icheck.min.js'
        // more plugin Js here
    ];
    public $css = [
        'iCheck/all.css'
        // more plugin CSS here
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}
