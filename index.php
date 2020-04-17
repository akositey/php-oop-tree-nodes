<?php

require "vendor/autoload.php";

use App\DB;
use App\Node;
use App\Tree;

//show the tree
$content = "";
$dataTree = "";

//get all nodes
$node = new Node(DB::instance());
$allNodes = $node->all();

if ($allNodes) {
    $dataTree = Tree::buildData($allNodes);
    $content .= Tree::buildElements($dataTree);
} else {
    // tree does not exist, allow to create root
    $content .= "Info: tree does not exist.<br/>";
    $content .= "<a href='/scripts/createRoot.php' id='btn-create-root'>Create Root</a>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Node Test</title>
    <link rel="stylesheet" href="assets/css/App.css">

</head>

<body>
    <div id="error-message"></div>
    <?php
    echo $content;
    ?>
</body>
<footer>
    <!-- <script src="assets/js/App.js"></script> -->
</footer>

</html>
