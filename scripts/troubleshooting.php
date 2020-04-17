<?php
echo "<pre>";
echo "Error!: " . $e->getMessage() . "<br/><br/>";
echo "1. Make sure MySQL is installed and running on your system.(Also PDO extension must be enabled.)<br/>";
echo "2. Make sure you have imported 'resources/create_wrshealth_db.sql' (this creates the table)<br/>";
echo "</pre>";

//TODO: write a version for SQLite
