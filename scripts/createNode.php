<?php

/**
 * create a node under a given parent
 */

require "../vendor/autoload.php";


if (!isset($_REQUEST["parent"])) {
    exit("Parent id was not supplied. Make sure you use the '+' button");
}
$parentNode = $_REQUEST["parent"];

use App\DB;
use App\Node;

$node = new Node(DB::instance());
if ($node->create($parentNode)) {
    header("location: ../index.php");
} else {
    echo "Did not create successfully";
}
