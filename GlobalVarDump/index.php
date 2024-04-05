<?php
$path_prefix = "/dev/vardump/"; // Replace with your WEB path to this folder


$code_document = isset($_SERVER['REQUEST_URI']) ? explode('/', str_replace($path_prefix, '', $_SERVER['REQUEST_URI'])) : [];
$code_document = $code_document[0] != "" ? $code_document : [];
$code_document = array_filter($code_document, function($value) {
  return $value !== ""; 
});

$SG = $GLOBALS;
foreach ($code_document as $i => $code) {
  if (!isset($SG[$code])) {
    echo "The entry <b>" . $code . "</b> doesn't exist under [ <b>" . implode('</b> / <b>', array_slice($code_document, 0, $i)) . "</b> ].";
    return;
  }
  $SG = $SG[$code];
}

echo "<pre>";
var_dump($SG);
echo "</pre>";
