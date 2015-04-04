<?php
namespace adzadzadz\modules\blogger;

use Yii;
use adzadzadz\modules\blogger\models\SettingsSetup;

class Rbac
{
    public function init()
    {
        $rbacCheck = SettingsSetup::getSettingByKey('rbac');

        if($rbacCheck['value'] == 0) {
            $auth = Yii::$app->authManager;
            
            //CREATE PERMISSIONS        
            //Permission to create posts
            $bloggerAuthor = $auth->createPermission('bloggerCreatePost');
                $bloggerAuthor->description = 'Allowed to create blog posts from blogger module';
                $auth->add($bloggerAuthor);
         
            //Permission to edit posts created my authors
            $bloggerEditor = $auth->createPermission('bloggerModifyPost');
                $bloggerEditor->description = 'Allowed to modify posts by an author.';
                $auth->add($bloggerEditor);
             	
            //ROLES AND PERMISSIONS
            //author role
            $author = $auth->createRole('bloggerAuthor');  //author role
            $auth->add($author); 
            // ... add $bloggerAuthor as children of $author ...
            $auth->addChild($author, $bloggerAuthor);

            //user role
            $editor = $auth->createRole('bloggerEditor');  //editor role
            $auth->add($editor);
            // ... add $bloggereditor as children of $editor ...
            $auth->addChild($editor, $bloggerEditor);
            
            //admin role
            $admin = $auth->createRole('bloggerAdmin');
            $auth->add($admin);
            // ... add permissions as children of $editor ..
            $auth->addChild($admin, $author); //user is a child of author
            $auth->addChild($admin, $editor); //admin can modify Post

            // Assigning users their roles
            $auth->assign($author, 3);
            $auth->assign($admin, 17);

            $updateBloggerSetting = SettingsSetup::updateSettingByKey('rbac', '1');
          
        }
    }
}