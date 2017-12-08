<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class FontAwesomeAsset extends AssetBundle
{

    public $sourcePath = '@vendor/fortawesome/font-awesome'; 
	public $css = [ 'css/font-awesome.css'];
}
