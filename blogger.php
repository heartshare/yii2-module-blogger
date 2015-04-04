<?php

namespace adzadzadz\modules\blogger;

use adzadzadz\modules\blogger\Rbac;

class blogger extends \yii\base\Module
{
    public $controllerNamespace = 'adzadzadz\modules\blogger\controllers';

    public function init()
    {
        parent::init();

	    // @var ../Rbac.php
    	Rbac::init();    	
    }
}