<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Text extends Eloquent
{

  protected $table = 'texts';

  public static function retrieve_texts($verse_id, $range_id) {

    return parent::where('id', '>=', $verse_id)
            ->where('id', '<=', $range_id)
            ->get();

  }

}
