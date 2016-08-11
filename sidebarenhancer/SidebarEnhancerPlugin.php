<?php
namespace Craft;

class SidebarEnhancerPlugin extends BasePlugin
{

    public function getName()
    {
        return 'Craft sidebar enhancer';
    }

    public function getDescription()
    {
        return 'Adds \'System\' and \'Content\' options to Craft\'s sidebar';
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/nicholasodo/craft-sidebarenhancer';
    }

    public function getVersion()
    {
        return '1.0.3';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/nicholasodo/craft-sidebarenhancer/master/releases.json';
    }

    public function getSchemaVersion()
    {
        return '1.0.3';
    }

    public function getDeveloper()
    {
        return 'Nicholas O\'Donnell';
    }

    public function getDeveloperUrl()
    {
        return 'https://github.com/nicholasodo';
    }

    public function init()
    {
        parent::init();
        if (craft()->request->isCpRequest() && craft()->userSession->isAdmin()) {
            $this->renderCSS();
            $this->renderJS();
        }
    }

    private function renderCSS()
    {
        craft()->templates->includeCssFile(UrlHelper::getResourceUrl('sidebarenhancer/style.css'));
    }

    private function renderJS()
    {
        craft()->templates->includeJsFile(UrlHelper::getResourceUrl('sidebarenhancer/script.js'));
    }

}
