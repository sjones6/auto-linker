An example of this project in action can be found a spenceralanjones.com/sandbox/autolinker.


Project Structure

App/ contains custom PHP API for receiving and returning JSON. [Note: This code is being refactored at the moment. Pardom my mess.]

db/ Only one csv file at the moment. This file is read and entered into a MySQL database by readcsv.php. At that point, the API can interact with the db.
There are plans to add other texts to this tool, so the readcsv.php could be modified to fit these requirements.

index.php The file at spenceralanjones.com/sandbox/autolinker.

script.js Makes AJAX calls to send_verse.php and handles response. Written in raw js, so no library dependencies to slow the page down.
Eventually, I'd like to release the tool broadly and so I'd like to keep dependencies to a minimum.

assets/sass/ Sass files for index.php. It's a simple page so not much css required. There's enough media queries to make this viewable on a mobile devices.
