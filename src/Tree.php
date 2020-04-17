<?php

namespace App;

class Tree
{
    /**
     * Build Tree - Array 
     *
     * @param array $elements
     * @param integer $parentId
     * @return array
     */
    public static function buildData(array $elements, $parentId = 0): array
    {
        $branch = array();

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = self::buildData($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }


    /**
     * Build actual html elements
     *
     * @param array $nodes
     * @param integer $parentId
     * @return string
     */
    function buildElements(array $nodes, $parentId = 0): string
    {
        $tree = "<ul>";
        foreach ($nodes as $node) {
            $tree .= "<li>";
            $tree .= ($parentId !== 0 ? "node" : "root") . "<a href='/scripts/createNode.php?parent={$node['id']}'> + </a>";
            $tree .= $parentId !== 0 ? "<a href='/scripts/deleteNode.php?id={$node['id']}'> - </a>" : "";
            $tree .= "</li>";
            if (isset($node['children']) && count($node['children']) > 0) {
                $tree .= "<li>";
                $tree .= self::buildElements($node['children'], $node['id']);
                $tree .= "</li>";
            }
        }
        $tree .= "</ul>";

        return $tree;
    }
}
