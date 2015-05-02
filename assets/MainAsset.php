<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace adzadzadz\modules\blogger\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MainAsset extends AssetBundle
{
    public $sourcePath = '@adz/assets';
    public $css = [
        'main/css/style.css',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
    ];
    public $js = [
        'main/js/ajax.js',
        'main/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}