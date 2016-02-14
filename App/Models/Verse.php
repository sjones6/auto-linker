<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Verse extends Eloquent
{

  protected $table = 'verses';

  public static function retrieve_id($book, $chapter, $verse) {

    $verse = parent::where('Book', '=', $book)
            ->where('Chapter', '=', $chapter)
            ->where('Verse', '=', $verse)
            ->first();

    $return = array('id' => $verse->id,
                    'book' => $verse->Book,
                    'chapter' => $verse->Chapter,
                    'verse' => $verse->Verse);

    return $return;

  }

  public static function retrieve_range_id($book, $chapter, $range) {

    $closingVerse;

    $verse = parent::where('Book', '=', $book)
            ->where('Chapter', '=', $chapter)
            ->where('Verse', '<=', $range)
            ->orderBy('id', 'desc')
            ->first();

    $return = array('id' => $verse->id,
                    'chapter' => $verse->Chapter,
                    'verse' => $verse->Verse);

    return $return;

  }

}
