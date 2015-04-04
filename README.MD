To access the module, you need to add this to your application configuration:

    ......
	'modules' => [
        'blogger' => [
            'class' => 'adzadzadz\modules\blogger\blogger',
            //'viewPath' => __DIR__ . '/../../frontend/views', // (optional) Will use views from module if not set
            'aliases' => [
                '@bloggerSample' => 'This is an alias sample', // echo \Yii::getAlias('@bloggerSample') ;
            ]
        ],
    ],
    ......

# Migrations --helper

# migrate the migrations in a module non-interactively
yii migrate --migrationPath=vendor/adzadzadz/yii2-module-blogger/migrations --interactive=0