To access the module, you need to add this to your application configuration:

    ......
	'modules' => [
        'blogger' => [
            'class' => 'adzadzadz\modules\blogger\blogger',
        ],
    ],
    ......

# Migrations --helper

# migrate the migrations in a module non-interactively
yii migrate --migrationPath=vendor/adzadzadz/yii2-module-blogger/migrations --interactive=0