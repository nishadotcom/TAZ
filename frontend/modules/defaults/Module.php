<?php

namespace app\modules\defaults;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\defaults\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        /**\Yii::$app->view->theme = new \yii\base\Theme([
            'pathMap' => ['@app/views' => '@app/../themes/dt'],
            'baseUrl' => '@web/themes/dt',
        ]);**/
    }
}
