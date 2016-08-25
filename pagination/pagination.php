<?php
// Elemente pro Seite
$entriesPerPage = 2;

/** ------------------ */
// Dummy-Elemente die dargestellt werden soll
$numberOfElements = 10;

// Dummie-Entries erzeugen (sollen dann aus der DB kommen)
$elements = array();
for ($i = 1; $i <= $numberOfElements; $i++) {
    $elements[] = array(
        'title'         => 'Titel ' . $i,
        'description'   => 'Description '. $i,
        'status'        => 'active'
    );
}
/** ------------------ */

// Aktuelle Seite ermitteln
$page = intval($_GET['page']);
// Sicherstellen das wir immer auf Seite 1 sind, wenn keine oder eine Seite < 0 übergeben wurde
if ($page <= 0) {
    $page = 1;
}

// Maximale Anzahl der Seiten ermitteln
$maxPage = ceil(count($elements) / $entriesPerPage);

// Sicherstellen das die übergebene Seite nicht größer als die maxPage sein kann
if ($page > $maxPage) {
    $page = $maxPage;
}

// Offset ermitteln
$offset = 0;
if ($page > 1) {
    $offset = ($page - 1) * $entriesPerPage;
}

// Hole die Ergebnisse, die auf der aktuellen Seite angezeigt werden
$displayEntries = array_slice($elements, $offset, $entriesPerPage);

// Ausgabe der aktuellen Seite
echo '<h2> Seite ' . $page .' von ' . $maxPage . '</h2>';

// Ausgabe der Tabelle
echo '<table style="border: solid 1px black;"><tr><th>Titel: </th><th>Description: </th><th>Status: </th></tr>';
$tableFormat = '<tr><td>%s</td><td>%s</td><td>%s</td></tr>';
foreach ($displayEntries as $displayEntry) {
    echo sprintf($tableFormat, $displayEntry['title'], $displayEntry['description'], $displayEntry['status']);
}
echo '</table> <br />';

// Ausgabe "Zurück"-Link, nur wenn wir nicht auf der ersten Seite sind
if ($page != 1) {
    echo '<a href="?page=' . ($page - 1) . '">Zurück</a> ';
}

// Pagination zusammenbauen
$pagination = '';
for ($i = 1; $i < ($maxPage + 1); $i++) {
    $currentElement = $i;

    if ($i != $page) {
        $currentElement = ' <a href="?page=' . $i . '">' .$i .'</a> ';
    }

    $pagination .= $currentElement;
}

// Pagingation ausgeben
echo $pagination;

// Ausgabe "Vorwärts"-Link, nur wenn wir nicht auf der letzten Seite sind
if ($page < $maxPage) {
    echo ' <a href="?page=' . ($page + 1) . '">Vorwärts</a>';
}
