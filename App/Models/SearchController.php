<?php

namespace App\Models;

use App\Models\Text;
use App\Models\Verse;
use Illuminate\Database\Eloquent\Model as Eloquent;

class SearchController extends Eloquent
{

  public static function retrieve_verse($book, $chapter, $verse, $range) {


    //return Verse::retrieve_id($book, $chapter, $verse);

    //return Verse::retrieve_range_id($book, $chapter, $range);

    return Text::retrieve_texts(1, 2);

    /*return Text::table('texts')
                      ->join('verses', 'verses.id', '=', 'texs.id')
                      ->where('verses.Book', '=', $book)
                      ->where('verses.Chapter', '=', $chapter)
                      ->where('verses.Verse', '=', $verse)
                      ->get();*/
  }

}
