<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class AdminModels extends CI_Model{
        
        public function getData($table)
        {
            $data = $this->db->get($table)->result_array();
            return $data;
        }

        public function setData($table, $array)
        {
            $this->db->insert($table, $array);
        }

        public function deleteData($id, $column, $table)
        {
            $this->db->where($column, $id);
            $this->db->delete($table);
        }


        public function getEnumVals($table, $field)
        {
            $type = $this->db->query("SHOW COLUMNS FROM {$table} WHERE Field ='{$field}'")->row(0)->Type;
            preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
            $enum = explode("','", $matches[1]);
            return $enum;
        }
    }
?>