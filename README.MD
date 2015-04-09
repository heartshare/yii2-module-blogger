#Installation

- Add this to your composer.json and update composer.

    ......
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/adzadzadz/yii2-module-blogger"
        }
    ],
    "require": {
        "adzadzadz/yii2-module-blogger": "*"
    }
    ......


To access the module, you need to add this to your application configuration:

    ......
	'modules' => [
        'blogger' => [
            'class' => 'adzadzadz\modules\blogger\blogger',
            //'viewPath' => __DIR__ . '/../../frontend/views', // (optional) blogger will use default views from adzadzadz/yii2-module-blogger/views if not set
            'aliases' => [
                '@bloggerSample' => 'This is an alias sample', // echo \Yii::getAlias('@bloggerSample') ;
            ]
        ],
    ],
    ......


##DB Migrations
- yii migrate --migrationPath=vendor/adzadzadz/yii2-module-blogger/migrations --interactive=0
- then access index.php?r=blogger to initialize permission requirements.

##Set view permission using:
- \Yii::$app->user->can($role)
    - $role can be any of the following: 
        - (permissions: bloggerCreatePost, bloggerEditPost, bloggerDeletePost) or 
        - (roles: bloggerAuthor, bloggerEditor, bloggerAdmin)
    -Example: \Yii::$app->user->can('bloggerAuthor');