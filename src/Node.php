<?php

namespace App;

use App\DB;

class Node
{
    private $db;
    private $table = "nodes";
    private $data = null;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    /**
     * Get all nodes
     *
     * @return array
     */
    public function all(): array
    {
        if ($this->data == null) {
            $this->data = $this->db->run("SELECT * FROM `{$this->table}`")->fetchAll();
        }
        return $this->data;
    }

    /**
     * Check if a node is existing
     *
     * @param integer $id
     * @return boolean
     */
    public function exists(int $id): bool
    {
        return $this->db->run("SELECT COUNT(*) as `counter` FROM `{$this->table}` WHERE `id`=?", [$id])->fetch()['counter'] ? true : false;
    }

    /**
     * Create the root node if it does not exist
     *
     * @return boolean
     */
    public function createRoot(): bool
    {
        if (!$this->data) {
            $this->all();
        }

        if (count($this->data)) {
            return false;
        }
        //create root node
        $create = $this->db->run("INSERT INTO `{$this->table}` (`parent_id`) VALUES (null)");
        return $create ? true : false;
    }

    /**
     * Create a new node under a given parent
     *
     * @param integer $parentId
     * @return boolean
     */
    public function create(int $parentId): bool
    {
        if ($this->exists($parentId)) {
            //create
            $create = $this->db->run("INSERT INTO `{$this->table}` (`parent_id`) VALUES (?)", [$parentId]);
            return $create ? true : false;
        }
        return false;
    }

    /**
     * Delete A node
     *
     * @param integer $nodeId
     * @return boolean
     */
    public function delete(int $nodeId): bool
    {
        if ($this->exists($nodeId)) {
            //delete
            $delete = $this->db->run("DELETE FROM `nodes` WHERE id=?", [$nodeId]);
            return $delete ? true : false;
        }
        return false;
    }
}
