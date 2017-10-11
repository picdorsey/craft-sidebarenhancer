<?php
namespace picdorsey\sidebarenhancer\services;

use yii\base\Component;
use \craft\elements\User;

class Visibility extends Component
{
    public function getAdmins()
    {
        return User::find().where('admin' => true).select(['id','username']).orderBy('id desc');
    }

    public function getAdminUsernamesAsArray()
    {
        $usernames = [];
        $admins = $this->getAdmins();

        foreach ($admins as $admin) {
            $usernames[] = $admin->username;
        }

        return $usernames;
    }

    public function shouldShowEnhancedSidebar()
    {
        $user = \Craft::$app->getUser();
        $enabledFor = \Craft::$app->getPlugins()->getPlugin('sidebarEnhancer')->getSettings()->enabledFor;
        $isEnabled = $enabledFor === '*' || (is_array($enabledFor) && $user && in_array($user->username, $enabledFor));

        return \Craft::$app->getRequest()->getIsCpRequest()
            && $user
            && $user->admin
            && $isEnabled;
    }
}
