<?php
namespace Craft;



class SidebarEnhancerPlugin extends BasePlugin
{
    public function getName()
    {
        return 'Sidebar enhancer';
    }

    public function getDescription()
    {
        return 'Adds \'System\' and \'Content\' options to Craft\'s sidebar.';
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/picdorsey/craft-sidebarenhancer/blob/master/readme.md';
    }

    public function getVersion()
    {
        return '1.1.0';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/picdorsey/craft-sidebarenhancer/master/releases.json';
    }

    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    public function getDeveloper()
    {
        return 'Piccirilli Dorsey, Inc.';
    }

    public function getDeveloperUrl()
    {
        return 'https://github.com/picdorsey';
    }

    public function init()
    {
        parent::init();
        if (Craft::$app->sidebarEnhancer->shouldShowEnhancedSidebar()) {
            $this->_renderCSS();
            $this->_renderJS();
        }
    }



    private function _renderCSS()
    {
        // see https://github.com/craftcms/docs/blob/master/en/asset-bundles.md#getting-published-file-urls
        // for explanation on usage of \Craft::$app->assetManager->getPublishedUrl
        Craft::$app->view->includeCssFile( \Craft::$app->assetManager->getPublishedUrl('@picdorsey-sidebarenhancer/resources', true).'/sidebarEnhancer_style.css' );
    }

    private function _renderJS()
    {
        // see https://github.com/craftcms/docs/blob/master/en/asset-bundles.md#getting-published-file-urls
        // for explanation on usage of \Craft::$app->assetManager->getPublishedUrl
        Craft::$app->view->includeJsFile( \Craft::$app->assetManager->getPublishedUrl('@picdorsey-sidebarenhancer/resources', true).'/sidebarEnhancer_script.js' );
    }

    public function hasCpSection()
    {
        return false;
    }

    protected function defineSettings()
    {
        return [
            'enabledFor' => [
                AttributeType::Mixed,
                'default' => '*'
            ]
        ];
    }

    public function getSettingsHtml()
    {
        return Craft::$app->view->renderTemplate('sidebar-enhancer/SidebarEnhancer_Settings', [
           'settings' => $this->getSettings(),
           'admins' => Craft::$app->sidebarEnhancer->getAdmins()
        ]);
    }
}
