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
yii migrate --migrationPath=@app/modules/forum/migrations --interactive=0