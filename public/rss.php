<?php
$url = "http://hiko1985.hatenablog.com/feed";
$xml = file_get_contents($url);
header("Content-type: application/xml; charset=UTF-8");
print $xml;
?>