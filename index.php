<?php
//output header to buffer instead of sending to client
ob_start();
include 'header.html';
$buffer = ob_get_contents();
ob_end_clean();

$page = $_GET['p'];

if (!(file_exists("pages/$page.html"))) {
	$page = "home";
}

$pageTitle = str_replace("_", " ", $page);
$pageTitle = ucwords($pageTitle);

$title = "$pageTitle | Code@IU";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);

echo $buffer;
include "pages/$page.html";
include 'footer.html';
?>