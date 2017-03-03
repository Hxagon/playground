<?php
namespace classes;

require_once 'Database.php';

/**
 * Class PageManager
 */
class PageManager
{
    private $page;
    private $pages;

    /**
     * PageManager constructor.
     * @param $page
     */
    public function __construct()
    {
    }

    public function insertPage()
    {

    }

    public function updatePage()
    {

    }

    public function deletePage()
    {

    }

    /**
     * @return mixed
     */
    public function getPages()
    {
        $database = new Database();
        $pages = $database->getAllPages();
        return $pages;
    }
}
