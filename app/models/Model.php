<?php namespace Models;

class Model
{
    protected $table;
    protected $where;
    protected $columns;
    protected $limit;
    protected $db;

    public function __construct($args = [])
    {
        $args = array_merge(array(
            'where' => '',
            'columns' => '*',
            'limit' => 0
        ), $args);

        if (!isset($args['table'])) {
            die('Table not defined.');
        }

        extract($args);

        $this->table = $table;
        $this->where = $where;
        $this->columns = $columns;
        $this->limit = $limit;

        $db_object = \Config\Database::get_instance();
        $this->db = $db_object::get_db();
    }

    public function get($id)
    {
        $result = $this->find(['where' => 'id = ' . $id]);

        return $result;
    }

    public function find($args = [])
    {
        $args = array_merge([
            'table' => $this->table,
            'where' => '',
            'columns' => '*',
            'limit' => 0
        ], $args);

        if (!$args) {
            return [];
        }

        extract($args);

        $query = "SELECT {$columns} FROM {$table}";

        if (!empty($where)) {
            $query .= " WHERE $where";
        }

        if (!empty($limit)) {
            $query .= " LIMIT $limit";
        }

        $result_set = $this->db->query($query);
        $results = $this->process_result($result_set);

        return $results;
    }

    protected function process_result($result_set)
    {
        $result = array();

        if (!empty($result_set) && $result_set->num_rows > 0) {
            while ($row = $result_set->fetch_assoc()) {
                $result[] = $row;
            }
        }

        return $result;
    }
}