<?php

/**
 * deletes a node with its children
 */

require "../vendor/autoload.php";

if (!isset($_REQUEST["id"])) {
    exit("Node id was not supplied. Make sure you use the '-' button for deleting.");
}

$nodeId = $_REQUEST["id"];

use App\DB;
use App\Node;

$node = new Node(DB::instance());
if ($node->delete($nodeId)) {
    header("location: ../index.php");
}
