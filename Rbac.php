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
            $bloggerCreatePost = $auth->createPermission('bloggerCreatePost');
                $bloggerCreatePost->description = 'Allowed user to create posts.';
                $auth->add($bloggerCreatePost);
        
            $bloggerEditPost = $auth->createPermission('bloggerEditPost');
                $bloggerEditPost->description = 'Allow user to modify posts.';
                $auth->add($bloggerEditPost);

            $bloggerDeletePost = $auth->createPermission('bloggerDeletePost');
                $bloggerDeletePost->description = 'Allow user to delete a post.';
                $auth->add($bloggerDeletePost);
             	
            //ROLES AND SET PERMISSIONS
            // blogger author role
            $author = $auth->createRole('bloggerAuthor');
            $auth->add($author);
            // blogger author permissions
            $auth->addChild($author, $bloggerCreatePost);
            $auth->addChild($author, $bloggerEditPost);
            $auth->addChild($author, $bloggerDeletePost);

            // blogger editor role
            $editor = $auth->createRole('bloggerEditor');  
            $auth->add($editor);
            // blogger editor permissions
            $auth->addChild($editor, $bloggerEditPost);
            
            // blogger admin role
            $admin = $auth->createRole('bloggerAdmin');
            $auth->add($admin);
            // blogger admin can do what the "author" and "editor" can.
            $auth->addChild($admin, $author);
            $auth->addChild($admin, $editor);

            // Assigning users their roles
            $auth->assign($admin, 1); // 2nd param is the user ID.

            $updateBloggerSetting = SettingsSetup::updateSettingByKey('rbac', '1');
            $addBlogPostType = Post::addPostType('blog', 'blog');
        }
    }
}