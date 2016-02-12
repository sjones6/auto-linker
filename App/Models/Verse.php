<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Verse extends Eloquent
{

  protected $table = 'verses';

  public static function retrieve_id($book, $chapter, $verse) {

    return parent::where('Book', '=', $book)
            ->where('Chapter', '=', $chapter)
            ->where('Verse', '=', $verse)
            ->first();

  }

  public static function retrieve_range_id($book, $chapter, $range) {

    return parent::where('Book', '=', $book)
            ->where('Chapter', '=', $chapter)
            ->where('Verse', '=', $range)
            ->first();

  }

}
