<?php

namespace adzadzadz\modules\blogger;

use adzadzadz\modules\blogger\models\SettingsSetup;
use adzadzadz\modules\blogger\Rbac;
use Yii;

class blogger extends \yii\base\Module
{
    public $controllerNamespace = 'adzadzadz\modules\blogger\controllers';

    public function init()
    {
        parent::init();

        Yii::setAlias('@adz', __DIR__ );
        Yii::setAlias('@blogger', __DIR__ );

        $rbacCheck = SettingsSetup::getSettingByKey('rbac');

        if($rbacCheck['value'] < 1) {
		    // @var ../Rbac.php
	    	Rbac::init();
    	}
    }
}