<?php

namespace App\Resources\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection(array(
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'texts',
    'username'  => 'root',
    'password'  => '1078',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
));

$capsule->bootEloquent();

/*
class DB
{

  public function __construct() {
    $capsule = new Capsule;

    $capsule->addConnection(array(
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'texts',
        'username'  => 'root',
        'password'  => '1078',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => ''
    ));

    $capsule->bootEloquent();
  }


  public static $capsule = new Capsule;

  public static $capsule->addConnection(array(
      'driver'    => 'mysql',
      'host'      => 'localhost',
      'database'  => 'texts',
      'username'  => 'root',
      'password'  => '1078',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => ''
  ));

  public static function test() {
    echo "Test" . "<br>";
  }

}*/

?>
