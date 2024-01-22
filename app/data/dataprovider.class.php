<?php

require('glossary.class.php');

class DataProvider {
    function __construct(public $source){
        
    }

    public function get_terms() {
    
    }

    // get users
    public function get_users() {

    }
    
    public function get_term($term) {

    }

    // get user
    public function get_user($email) {

    }
    
    public function search_terms($search) {

    }

    // search users
    public function search_users($search) {

    }
        
    public function add_term($term, $definition) {

    }
    
    public function update_term($original_term, $new_term, $definition) {

    }
    
    public function delete_term($term) {

    }

}