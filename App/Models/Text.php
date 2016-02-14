<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Text extends Eloquent
{

  protected $table = 'texts';

  public static function retrieve_single_text($verse_id) {

    $verse = parent::where('id', '=', $verse_id)
            ->get();

    return $verse;

  }

  public static function retrieve_multiple_texts($verse_id, $range_id) {

    $return = '';

    $texts = parent::where('id', '>=', $verse_id)
            ->where('id', '<=', $range_id)
            ->get();

    //DB query returns two Eloquent ORM.
    //Limit results returned to one.
    // Concatenate translations together
    // and return.
    $total = count($texts) / 2;

    $i = 0;
    foreach ( $texts as $text) {

      if ( $i >= $total) {

        return $return;

      } else {

        $return = $return . ' ' . $text->ET;
        $i++;

      }

    }



  }

}
