<?php

namespace App;

use App\Resources\Books\BookName as BookName;

//Class = BookName
//Parameters: 1- default book name; 2- secondary names in array

$book_names = array();

//OT
$book_names[] = new BookName('Genesis', array('Gen', 'Ge') );
$book_names[] = new BookName('Exodus', array('Exod', 'Ex') );
$book_names[] = new BookName('Leviticus', array('Lev', 'Leu') );
$book_names[] = new BookName('Numbers', array('Num', 'Nu') );
$book_names[] = new BookName('Deuteronomy', array('Deut', 'De', 'Deu') );
$book_names[] = new BookName('Joshua', array('Josh', 'Jo') );
$book_names[] = new BookName('Judges', array('Judge', 'Ju') );
$book_names[] = new BookName('Ruth', array('Ru') );
$book_names[] = new BookName('1 Samuel', array('1 Sam', '1Sam', '1 Sa', '1 Kingdoms', '1 Kgdms', '1 Regn') );
$book_names[] = new BookName('2 Samuel', array('2 Sam', '2Sam', '2 Sa', '2 Kingdoms', '2 Kgdms', '2 Regn') );
$book_names[] = new BookName('1 Kings', array('1 Kin', '1Kgs', '1 Ki', '1 Kg', '1 Kgs', '3 Kingdoms', '3 Kgdms', '3 Kgdm', '3 Regn') );
$book_names[] = new BookName('2 Kings', array('2 Kin', '2Kgs', '2 Ki', '4 Kingdoms', '4 Kgdms', '4 Regn') );
$book_names[] = new BookName('1 Chronicles', array('1 Chron', '1Chr', '1 Chr') );
$book_names[] = new BookName('2 Chronicles', array('2 Chron', '2Chr', '2 Chr') );
$book_names[] = new BookName('Ezra', array('Ez', 'Ezr') );
$book_names[] = new BookName('Nehemiah', array('Neh') );
$book_names[] = new BookName('Esther', array('Est', 'Esth') );
$book_names[] = new BookName('Job', array('') );
$book_names[] = new BookName('Psalms', array('Psa', 'Pss', 'Ps') );
$book_names[] = new BookName('Proverbs', array('Prov', 'Pro') );
$book_names[] = new BookName('Ecclesiastes', array('Eccl', 'Qoheleth', 'Koheleth', 'Qoh', 'Koh') );
$book_names[] = new BookName('Song of Songs', array('Song') );
$book_names[] = new BookName('Isaiah', array('Isa', 'Esa') );
$book_names[] = new BookName('Jeremiah', array('Jer', 'Ier') );
$book_names[] = new BookName('Lamentations', array('Lam') );
$book_names[] = new BookName('Ezekiel', array('Ezek', 'Eze') );
$book_names[] = new BookName('Daniel', array('Dan') );
$book_names[] = new BookName('Hosea', array('Hos', 'Ho') );
$book_names[] = new BookName('Joel', array('Joe', 'Jo') );
$book_names[] = new BookName('Amos', array('Amo') );
$book_names[] = new BookName('Obadiah', array('Ob', 'Obad') );
$book_names[] = new BookName('Jonah', array('Jon') );
$book_names[] = new BookName('Micah', array('Mic') );
$book_names[] = new BookName('Nahum', array('Nah') );
$book_names[] = new BookName('Habbakuk', array('Hab') );
$book_names[] = new BookName('Zephaniah', array('Zeph') );
$book_names[] = new BookName('Haggai', array('Hag', 'Hagg') );
$book_names[] = new BookName('Zechariah', array('Zech') );
$book_names[] = new BookName('Malachi', array('Mal') );

//NT
$book_names[] = new BookName('Matthew', array('Matt', 'Mat') );
$book_names[] = new BookName('Mark', array('Mar') );
$book_names[] = new BookName('Luke', array('Luk') );
$book_names[] = new BookName('John', array('Joh') );
$book_names[] = new BookName('Acts', array('Act', 'Ac') );
$book_names[] = new BookName('Romans', array('Rom') );
$book_names[] = new BookName('1 Corinthians', array('1 Cor', '1Cor') );
$book_names[] = new BookName('2 Corinthians', array('2 Cor', '2Cor') );
$book_names[] = new BookName('Galatians', array('Gal') );
$book_names[] = new BookName('Ephesians', array('Eph') );
$book_names[] = new BookName('Philippians', array('Phil', 'Phi') );
$book_names[] = new BookName('Colossians', array('Col') );
$book_names[] = new BookName('1 Thessalonians', array('1 Thess', '1 Thes', '1Thess') );
$book_names[] = new BookName('2 Thessalonians', array('2 Thess', '2 Thes', '2Thess') );
$book_names[] = new BookName('1 Timothy', array('1 Tim', '1 Ti', '1Tim') );
$book_names[] = new BookName('2 Timothy', array('2 Tim', '2 Ti', '2Tim') );
$book_names[] = new BookName('Titus', array('Tit') );
$book_names[] = new BookName('Philemon', array('Phlm', 'Phlmn') );
$book_names[] = new BookName('Hebrews', array('Heb') );
$book_names[] = new BookName('James', array('Jam', 'Jas') );
$book_names[] = new BookName('1 Peter', array('1 Pet', '1 Pe', '1Pet') );
$book_names[] = new BookName('2 Peter', array('2 Pet', '2 Pe', '2Pet') );
$book_names[] = new BookName('1 John', array('1 Joh', '1 Jo', '1John') );
$book_names[] = new BookName('2 John', array('2 Joh', '2 Jo', '2John') );
$book_names[] = new BookName('3 John', array('3 Joh', '3 Jo', '3John') );
$book_names[] = new BookName('Jude', array('Ju') );
$book_names[] = new BookName('Revelation', array('Rev', 'Revelations') );
