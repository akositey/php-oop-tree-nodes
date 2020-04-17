<?php

/**
 * creates root node if it does exist
 */

require "../vendor/autoload.php";

use App\DB;
use App\Node;

$node = new Node(DB::instance());
if ($node->createRoot()) {
    header("location: ../index.php");
}
