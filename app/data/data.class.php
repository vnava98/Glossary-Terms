<?php

require('dataprovider.class.php');

class Data {

    static private $ds;
    static public function initialize(DataProvider $data_provider){
        return self::$ds = $data_provider;
    }
    
    static public function get_terms() {
        return self::$ds->get_terms();
    }

    // get users
    static public function get_users() {
        return self::$ds->get_users();
    }

    static public function get_term($term) {
        return self::$ds->get_term($term);
    }


    // get user
    static public function get_user($email) {
        return self::$ds->get_user($email);
    }
    
    static public function search_terms($search) {
        return self::$ds->search_terms($search);
    }

    // search users
    static public function search_users($search) {
        return self::$ds->search_users($search);
    }
        
    static public function add_term($term, $definition) {
        return self::$ds->add_term($term, $definition);
    }
    
    static public function update_term($original_term, $new_term, $definition) {
        return self::$ds->update_term($original_term, $new_term, $definition);
    }

    static public function delete_term($term) {
        return self::$ds->delete_term($term);
    }
}