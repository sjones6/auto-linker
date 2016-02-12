<?php

namespace App\Resources\Books;

use App\Resources\BookName as BookName;

class BookChecker {

  public static function return_default_book_name($book) {

      require( __DIR__ . '/../../books.php');

      foreach ( $book_names as $book_name ) {

          $bookDefault = $book_name->return_default_name($book);

          if ( $bookDefault ) {

              return $bookDefault;
              break; //exit foreach
          }
      }
    }

}
