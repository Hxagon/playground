<?php
require_once '../classes/TemplateSystem.php';

$templateSystem = new TemplateSystem();

$requiredFiles = $templateSystem->parseView();
foreach ($requiredFiles as $requiredFile) {
    if (!empty($requiredFile)) {
        require_once $requiredFile;
    }
}
