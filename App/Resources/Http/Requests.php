<?php

namespace App\Resources\Http;

use Sabre\HTTP as HTTP;

use App\Models\Text as Text;
use App\Models\Verse as Verse;
use App\Resources\Books\BookChecker as BookChecker;

class Requests {

  /**
  * Returns Sabre request object.
  **/
  public static function make_request_object() {

    return HTTP\Sapi::getRequest();

  }

  /**
  * Parses GET request.
  **/
  public static function parse_requests($request) {

    $query = $request->getQueryParameters();

    if ( Requests::validate_request($query) ) {

      $bookDefault = BookChecker::return_default_book_name($query['book']);

      if ( $bookDefault ) {

        if ($query['verse'] === $query['closingVerse']) { //Single Verse Request

          $verse = Verse::retrieve_id($bookDefault, $query['chapter'], $query['verse']);

          $text = Text::retrieve_single_text($verse->id);

          return($text);

        } else { //Multi-verse request

          //All return values from Verse and Text calls are Eloquent ORMs.
          $verse_id = Verse::retrieve_id($bookDefault, $query['chapter'], $query['verse']);
          $range_id = Verse::retrieve_range_id($bookDefault, $query['chapter'], $query['closingVerse']);

          $texts = Text::retrieve_multiple_texts($verse_id->id, $range_id->id);

          return($texts);

        }

      } else {

        return json_encode( array('Error' => 'Book unknown') );
      }

    } else {

      return false;
    }

  }

  /**
  * Verifies that all GET requests data present and in good form
  **/
  protected static function validate_request($query) {

    if (    ( isset($query['book']) ) &&
            ( preg_match('/\d*\s?\w+/', $_GET['book']) ) &&
            ( isset($query['chapter']) ) &&
            ( !preg_match('/\D/', $_GET['chapter']) ) &&
            ( isset($query['verse']) ) &&
            ( !preg_match('/\D/', $_GET['verse']) ) &&
            ( isset($query['closingVerse']) ) &&
            ( preg_match('/\d*|not-range/', $query['closingVerse']) )
        ) {

          return true;

        } else {

          return false;

        }

  }

}
