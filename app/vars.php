<?php
$urlText = (isset($_POST['url-text']) or isset($_POST['search'])) ? $_POST['url-text'] : "";
$search = (isset($_POST['search'])) ? $_POST['search'] : "";
$keywords = ($search != "") ? preg_split('/\s+/', $search) : false;