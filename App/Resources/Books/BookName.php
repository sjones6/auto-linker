<?php

namespace App\Resources\Books;

class BookName {

    public $default_name = '';
    private $secondary_names = array();

    //first parameter is a string, second parameter is an array of strings.
    public function __construct($a, $b) {

        $this->default_name = $a;
        $this->secondary_names = $b;
    }

    //checks input to see if it matches either the default or secondary and returns default.
    //the default name is the db term.
    public function return_default_name($x) {

        if ( $x === $this->default_name ) {

            return $this->default_name;

        } else {

            foreach ( $this->secondary_names as $s_name ) {
                if ( $x === $s_name ) {
                    return $this->default_name;
                }
            }
        }
    }
}

?>
