<?php
function retrieveText($url) {
   if ($url != "") {
      return file_get_contents($url);
   } else {
      return "No url was entered!";
   }
}

$text = retrieveText($urlText);
if (!$text) {
   $text = "Wrong url was entered!";
}
$positions = [];
if ($keywords) {
   foreach($keywords as $keyword) {
      $anchor_number = 0;
      $offset = 0;
      $positions[$keyword] = array();
      while(($pos = strpos($text, $keyword, $offset)) !== false) {
         $positions[$keyword][] = $pos;
         $final_offset = $pos + strlen($keyword);
         $temptext = substr($text, 0, $pos) . '<span class="highlightme" id="' . $anchor_number . '-' . $keyword . '">' . substr($text, $pos, strlen($keyword)) . '</span>' . substr($text, $final_offset);
         $offset = $pos + (strlen($temptext) - strlen($text));
         $text = $temptext;
         $anchor_number += 1;
      }
   }
}
?>