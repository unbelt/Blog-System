<?php namespace Models;

class Model
{
    protected $table;
    protected $limit;
    protected $db;

    public function __construct($args = [])
    {
        $args = [
            'limit' => 0
        ];

        if (!isset($args['table'])) {
            die('Table not defined.');
        }

        extract($args);

        $this->table = $table;
        $this->limit = $limit;

        $db_object = \Database::get_instance();
        $this->db = $db_object::get_db();
    }

    public function find($args = [])
    {
        $defaults = [
            'table' => $this->table,
            'limit' => $this->limit,
            'where' => '',
            'columns' => '*'
        ];

        array_merge($defaults, $args);
        extract($defaults);

        $query = "SELECT {$columns} FROM {$table}";

        if (!empty($where)) {
            $query .= " WHERE $where";
        }

        if (!empty($limit)) {
            $query .= " LIMIT $limit";
        }

        $result_set = $this->db->query($query);
        $results = $this->process_results($result_set);

        return $results;
    }

    protected function process_results($result_set)
    {
        $results = [];

        if (!empty($result) && $result_set->num_rows > 0) {
            while ($row = $result_set->fetch_assoc) {
                $results[] = $row;
            }
        }

        return $results;
    }
}