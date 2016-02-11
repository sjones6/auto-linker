An example of this project in action can be found a spenceralanjones.com/sandbox/autolinker.

Project Structure

index.php Head file for API. Instatiates dependencies and calls App/start.php.

App/ Contains custom PHP API for receiving and returning JSON. [Note: This code is being refactored to use Eloquent's ORM at the moment. Pardon my mess.]

config/ Instantiates Capsule database connection.

db/ Only one csv file at the moment. This file is read and entered into a MySQL database by readcsv.php. At that point, the API can interact with the db.
There are plans to add other texts to this tool, so the readcsv.php could be modified to fit these requirements.

assets/sass/ Sass files for public/index.php. It's a simple page so not much css required. There's enough media queries to make this viewable on a mobile devices.

public/ Site files for spenceralanjones.com/sandbox/autolinker.

public/js/script.js Makes AJAX calls to send_verse.php and handles response. Written in raw js, so no library dependencies to slow the page down.
Eventually, I'd like to release the tool broadly and so I'd like to keep dependencies to a minimum.
