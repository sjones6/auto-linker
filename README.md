An example of this project in action can be found a spenceralanjones.com/sandbox/autolinker.

<h1>Project Structure</h1>

<h2>index.php</h2>
Gets the ball rolling. Instatiates dependencies and calls App/start.php.

<h2>App/</h2>
Contains custom PHP API for receiving and returning JSON. [Note: This code is being refactored to use Eloquent's ORM at the moment. Currently able to return Eloquent objects from database. Next step is to return organized JSON.]

<h2>config/</h2>
Instantiates Capsule database connection.

<h2>db/</h2>
Only one csv file at the moment. This file is read and entered into a MySQL database by readcsv.php (a short procedural script). At that point, the API can interact with the db.
There are plans to add other texts to this tool, so the readcsv.php could be modified to fit these requirements.

<h2>assets/sass/</h2>
Sass files for public/index.php. It's a simple page so not much css required. There's enough media queries to make this viewable on a mobile devices.

<h2>public/</h2>
Site files for spenceralanjones.com/sandbox/autolinker.

<h2>public/js/script.js</h2>
Makes AJAX calls to send_verse.php and handles response. Written in raw js, so no library dependencies to slow the page down. Eventually, I'd like to release the tool broadly and so I'd like to keep js dependencies to a minimum.
