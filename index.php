
<!DOCTYPE HTML>
<html>
    <head>
        
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="author" content="Spencer Jones">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="An auto linking tool for 2nd Temple Texts that provides the text in its original language.">
    <title>Spencer Jones | Auto Linker</title>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>
	<!--Locally hosted files-->
	<link href="style.css" type="text/css" rel="stylesheet"/>
</head>

<body>
    
    <div id="header-holder" class="centered">
        <h1 id="header-text">Biblical Text Auto-Linker</h1>
    </div>
    
    <div id="sandbox-explanation" class="centered">This project involves a backend written in PHP interacting with a MySQL database. The client side code includes JavaScript, JSON, and AJAX. Some basic styling of the pop-up is included in the JavaScript, although kept minimal so that users of this tool could style the box in their CSS file. The English version is the Lexham English Bible (see license <a href="http://lexhamenglishbible.com/license" target="_blank">here</a>).<br />
    The demo below shows how this tool might work on an academic blog or the like. The excerpted text below is a heavily modified bit from one of my papers. Click on any <span class="auto-linker-ref">reference</span> to see the tool in action.</div>
    
    <div id="sandbox-wrapper">
        
    <p>His treatment of Gen 10:13–14, which he considers an example of a non-restrictive relative clause, is representative. According to him, as was noted above, a resumptive pronoun after so-called relative connection is idiomatic in Koiné (see also Matt 4:21-25; Mark 1:2; Heb 3:3; Rev 3:2-6).</p>
        
        <p>Although he collects examples only from Greek Genesis, he finds a number of examples where resumption occurs in a non-restrictive clause (which he considers idiomatic): Gen 10:13–14; Gen 20:13; Gen 38:30; Gen 48:15; Lev 15:26; 3 Regn 13:15; Isa 1:21 (see also Gen 31:13; Gen 33:19; Gen 39:20; Gen 40:3; Lev 15:4, Lev 15:24; 3 Regn 13:31). These 23 examples are only three fewer than he has found in 600 years of Greek literature! It is obvious that the Hebrew Vorlage has exerted its influence here. Unfortunately, he does not provide the corresponding figure on how many times resumption occurs in restrictive clauses, which he considers unidiomatic.</p> 
        
        <p>Various formats are acceptable: 1 Kings 2:2; 1 Kgs 1.1; 3 Kingdoms 1,3; 3 Kgdms 2;1. Note however that non-existent references result only in a console entry (Matt 150:2). If the closing verse in a range of verse is greater than the verses in the chapter, the text will be up to the final verse of the chapter (Rev 1:18–50).</p> 
    
    </div>
    
    <div id="todo">
        <h1>To-Do:</h1>
    <ul>
        <li>Accept verse ranges that extend over chapters (e.g., Gen 1:1-2:4)</li>
        <li>Accept verses in a list without repeating book title (e.g., Gen 1:1–3; 2:2; 3:3–4)</li>
        <li>Add Masoretic text for Hebrew Bible references</li>
        <li>Add Greek version of New Testament and Septuagtint</li>
    </ul>
    </div>
    
</body>
</html>

<script src="script.js"></script>
<script>
    linker.linker();
</script>