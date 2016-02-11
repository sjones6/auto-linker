

( function(ns) {
    
    ns.linker = function(params) {

        var xhttp, oldPValue, pArray, pNumber, re, results, resultsLength, currentResult;

        //remove duplicates from array.
        function uniq_fast(a) {
            var seen = {};
            var out = [];
            var len = a.length;
            var j = 0;
            for(var i = 0; i < len; i++) {
                 var item = a[i];
                 if(seen[item] !== 1) {
                       seen[item] = 1;
                       out[j++] = item;
                 }
            }
            return out;
        }


        //Find all p elements and search for possible verse references. 
        //Each reference is wrapped in a span with a class .text-linker.
        pArray = document.getElementsByTagName("p");
        pNumber = pArray.length;

        for ( var i = 0; i < pNumber; i++ ) {

            //cache p node and value
            oldPValue = pArray[i].firstChild.nodeValue;

            //find all possible references in current p and sort array to remove duplicates.
            re = new RegExp(/(\d*\s?\w+)\s*(\d+)[\.,;:](\d+)[\u2014\u2013-]?(\d*)/gi);
            results = uniq_fast( oldPValue.match(re) ); 
            resultsLength = results.length;

            //iterate over p wrapping each reference in a span
            for ( var x = 0; x < resultsLength; x++ ) {
                currentResult = results[x];
                oldPValue = oldPValue.replace(new RegExp(currentResult, 'g'), '<span class="auto-linker-ref ">$&</span>');

            }

            pArray[i].innerHTML = oldPValue;
        }

        var tagsArray = document.getElementsByClassName("auto-linker-ref");
        var tagsNumber = tagsArray.length;

        for ( var i = 0; i < tagsNumber; i++ ) {
            tagsArray[i].addEventListener("click", function(event) {
                
                var that = this;
                //testing
                /*var time1 = Date.now();
                console.log(time1);*/

                var linkText = this.firstChild.nodeValue;
                var findReferenceRE = new RegExp(/(\d*\s*\w+)\s*(\d+)[\.,:;](\d+)[\u2014\u2013-]?(\d*)/);
                var results = findReferenceRE.exec(linkText);
                var resultsNumber = results.length;
            
                //remove leading spaces on book names.
                for ( var i = 0; i < resultsNumber; i++ ) {   
                    results[i] = ( results[i] ) ? results[i].replace(/^\s/, '') : 'not-range';
                }

                function createXMLHttpRequest() {
                    if ( window.XMLHttpRequest ) {
                        xhttp = new XMLHttpRequest();
                    } else {
                        xhttp = new ActiveXObject("Microsoft.XMLHTTP"); //IE6, IE5
                    }
                }

                function handleStateChange() {
                    if ( xhttp.readyState === 4 ) {
                        if ( xhttp.status === 200 ) {
                            if ( JSON.parse(xhttp.responseText) ) {
                                jsonObj = JSON.parse(xhttp.responseText);
                                displayResults(jsonObj);
                            }
                        } else {
                            console.log("Server didn't successfully send data.");
                        }
                    }
                }

                function startRequest() {

                    createXMLHttpRequest();
                    xhttp.onreadystatechange = handleStateChange;

                    var getParameters = [];

                    getParameters[0] = "book=" + results[1];
                    getParameters[1] = "chapter=" + results[2];
                    getParameters[2] = "verse=" + results[3];
                    getParameters[3] = "closingVerse=" + results[4];
                    
                    $requestURL = 'API/send_verse.php?' + getParameters.join('&');

                    xhttp.open('GET', 
                               $requestURL,
                               true);
                    xhttp.send(null);
                }

                function displayResults(result) {
                    //result parameter is a JSON object.
                    
                    var divs = document.getElementsByClassName('auto-linker').length;
                    if ( divs != 0 ) {
                        var linkDivs = document.getElementsByClassName('auto-linker');

                        while (linkDivs[0]) {
                            linkDivs[0].parentNode.removeChild(linkDivs[0]);
                        }
                    }

                    if (result.error) {
                        console.log("Error Message: " + result.error);
                    } else {
                        var node, html, div, divStyle;
                        
                        var div = document.createElement('div');
                        div.setAttribute("class", "auto-linker");
                        document.body.appendChild(div);
                        div.normalize();

                        //Removes markup from LEB.
                        var re3 = new RegExp('Or "[^"]*"', 'g');
                        var text = result.ET.replace(re3, '');
                        var re4 = new RegExp('{([^}]*)}(.*)Literally "[^"]*"', 'g');
                        var text = text.replace(re4, '$1');
                        
                        
                        divStyle = "position: absolute; z-index: 9999; width: auto;";
                        divStyle += "display: block;"
                        divStyle += "border: 2px solid black;";
                        divStyle += "padding: 10px;";
                        divStyle += "background: white;";
                        
                        div.style.cssText += ';' + divStyle;
                        
                        var windowWidth = window.innerWidth ||  
                            document.documentElement.clientWidth ||
                            document.body.clientWidth;
                        
                        console.log(windowWidth);
                        
                        var linkHeight = that.offsetHeight;
                        var linkTop = that.offsetTop
                        var rect = that.getBoundingClientRect();
                        div.style.top = (rect.top > 100) ? linkTop + linkHeight + "px" : linkTop + 30 + "px";
                        div.style.width = ( windowWidth > 680 ) 
                            ? ( windowWidth / 3 ) + "px" 
                            : ( windowWidth - 50 ) + "px"; 
                        
                        if ( windowWidth > 680 ) {
                            if (rect.left < ( windowWidth / 2 ) ) {
                                div.style.left = rect.left + "px";
                                div.style.right = "auto";
                            } else {
                                div.style.left = "auto";
                                div.style.right = window.innerWidth - rect.left + "px";
                            }
                        } else {
                            div.style.left = "25px";
                        }

                        html = "<h1 class='auto-link-header'>" + result.book + " " + result.chapter + ":" + result.verse + ( ( result.range != result.verse ) ? '-' + result.range : '' ) + "</h1>";
                        html += "<p class='auto-link-et'>" + text + " (LEB)</p>";

                        div.innerHTML = html;
                        
                        var closer = document.createElement('div');
                        var closerStyle 
                        closerStyle = "position: absolute;";
                        closerStyle += "top: 10px; right: 10px;";
                        closerStyle += "font-family: sans-serif;";
                        closer.style.cssText += ';' +  closerStyle;
                        closer.innerHTML = "x";
                        div.appendChild(closer);
                        
                        closer.addEventListener("click", function() {
                            var linkDivs = document.getElementsByClassName('auto-linker');

                            while (linkDivs[0]) {
                                linkDivs[0].parentNode.removeChild(linkDivs[0]);
                            }
                        });   
                    }

                //testing
                /*var time2 = Date.now();
                console.log(time2);
                elapsedTime = time2 - time1;
                console.log("Elapsed time: " + elapsedTime);*/
                }

                startRequest();
            });
        }
    }
}(this.linker = this.linker || {})); //invoke IIFE with this.linker or anonymous object.
