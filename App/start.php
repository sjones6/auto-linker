<?php

use App\Models\SearchController as SearchController;
use App\Models\Text as Text;
use App\Resources\Http\Requests as Request;

$request = Request::make_request_object();

$verses = Request::parse_requests($request);

foreach($verses as $verse) {

  var_dump($verse->ET);
  echo '<br>';
  
}


?>
