<?php
require_once '../config/general.config.php';

/**
 * Class TemplateSystem
 * @package TemplateSystem
 */
class TemplateSystem
{
    private $generalConfig;

    /**
     * TemplateSystem constructor.
     */
    public function __construct()
    {
        // Load general config
        $this->generalConfig = new GeneralConfig();
    }

    /**
     * @return array
     */
    public function parseView()
    {
        // Load layout
        $layoutTemplate = $this->generalConfig->getLayoutContent();
        // Determine current page
        $currentPage = $_GET['page'] ?? 'index';

        // Search for current page mapped with view
        $page = $this->generalConfig->getPageTemplate($currentPage);

        return array(
            'layout'    => $layoutTemplate,
            'page'      => $page,
        );
    }
}
