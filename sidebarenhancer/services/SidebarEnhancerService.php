<?php
namespace Craft;

class SidebarEnhancerService extends BaseApplicationComponent
{
    public function getAdmins()
    {
        $admins = Craft::$app->elements->getCriteria(ElementType::User, [
            'admin' => true,
            'order' => 'id desc',
        ]);

        return $admins;
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
        $user = Craft::$app->userSession->getUser();
        $enabledFor = Craft::$app->plugins->getPlugin('sidebarEnhancer')->getSettings()->enabledFor;
        $isEnabled = $enabledFor === '*' || (is_array($enabledFor) && $user && in_array($user->username, $enabledFor));

        return Craft::$app->request->isCpRequest()
            && $user
            && $user->admin
            && $isEnabled;
    }
}
