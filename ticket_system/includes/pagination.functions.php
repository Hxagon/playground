<?php

/**
 * @param $elementsPerPage
 * @param $currentPage
 * @param $overallResults
 * @param string $pageParam
 * @return string
 */
function renderPagination($elementsPerPage, $currentPage, $overallResults, $pageParam = 'pageNum')
{
    $lastPage = ceil($overallResults / $elementsPerPage);

    // Pages validieren
    if ($currentPage > $lastPage) {
        $currentPage = $lastPage;
    }

    if ($currentPage < 1) {
        $currentPage = 1;
    }

    $nextPage = $currentPage + 1;
    $previousPage = $currentPage - 1;

    if ($nextPage > $lastPage) {
        $nextPage = $lastPage;
    }

    if ($previousPage < 1) {
        $previousPage = 1;
    }
    // ---------------------------------

    // Pagination Layout
    $firstPreviousPageTemplate = '<div class="first-page"><a href="?' . $pageParam .'=1"><<</a> <a href="?' . $pageParam .'=' . $previousPage . '"><</a></div>';
    $lastNextPageTemplate = '<div class="last-page"><a href="?' . $pageParam .'=' . $nextPage . '">></a> <a href="?' . $pageParam .'=' . $lastPage . '">>></a></div>';
    $paginationTemplate = '<div class="pagination-wrapper">{PAGINATION}</div>';
    $paginationElements = '';

    for ($i = 1; $i <= $lastPage; $i++) {
        if ($currentPage == $i) {
            $paginationElements .= '<div><b>' . $i . '</b></div>';
            continue;
        }
        $paginationElements .= '<div><a href="?' . $pageParam .'=' . $i . '"> ' . $i . '</a></div>';
    }

    $paginationTemplate =
        $firstPreviousPageTemplate .
        str_replace('{PAGINATION}', $paginationElements, $paginationTemplate) .
        $lastNextPageTemplate;

    return $paginationTemplate;
}
