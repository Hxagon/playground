<?php

/**
 * Class GeneralConfig
 * @package TemplateSystem
 */
class GeneralConfig
{
    // Configuration
    const LAYOUT_PATH   = '../templates/layout/';
    const TEMPLATE_PATH = '../templates/';
    const HEADER_FILE   = 'header.phtml';
    const BODY_FILE     = 'body.phtml';
    const FOOTER_FILE   = 'footer.phtml';

    // \Configuration

    private $templateFiles;

    /**
     * GeneralConfig constructor.
     */
    public function __construct()
    {
        // Initialy check if configured files are existent
        $this->templateFiles = $this->getTemplateFiles();
    }

    /**
     * List alle *.phtml Dateien aus dem TEMPLATE_PATH in ein Array
     * @return array
     */
    private function getTemplateFiles()
    {

    }
}
