An example of this project in action can be found a spenceralanjones.com/sandbox/autolinker.


Project Structure

API/ contains custom PHP API for receiving and returning JSON.

db/ Only one csv file at the moment. This fill is read is entered into a MySQL db by readcsv.php. At that point, the API can interact with the db.

index.php The file at spenceralanjones.com/sandbox/autolinker

script.js Makes AJAX calls to send_verse.php and handles response. Written in raw js, so no library dependencies to slow the page down. 

assets/sass/ Sass files for index.php. It's a simple page so not much css required. There's enough media queries to make this viewable on a mobile devices.