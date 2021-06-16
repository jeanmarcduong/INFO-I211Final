/*
 * This script contains AJAX methods
 * Most of this code was referenced and is not my own, this is me saying that its not my own work. I am not plagiarizing by saying this.
 */
var xmlHttp;
var numTitles = 0;  //total number of suggested restaurant names
var activeTitle = -1;  //restaurant names currently being selected
var searchObj, suggestionObj;

//this function creates a XMLHttpRequest object. It should work with most types of browsers.
function createXmlHttpRequestObject()
{
    // stores the reference to the XMLHttpRequest object
    var objXmlHttp;
    // if running Internet Explorer 6 or older
    if (window.ActiveXObject)
    {
        try {
            objXmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e) {
            objXmlHttp = false;
        }
    }
    // if running Mozilla or other browsers
    else
    {
        try {
            objXmlHttp = new XMLHttpRequest();
        }
        catch (e) {
            objXmlHttp = false;
        }
    }
    // display an error message
    if (!objXmlHttp)
        alert("Error creating the XMLHttpRequest object.");

    // return the created object
    return objXmlHttp;
}

//initial actions to take when the page load
window.onload = function () {
    //create an XMLHttpRequest object by calling the createXmlHttpRequestObject function
    xmlHttp = createXmlHttpRequestObject();

    //DOM objects
    searchObj = document.getElementById('searchBox');
    suggestionObj = document.getElementById('suggestionDiv');
};



//set and send XMLHttp request. The parameter is the search term
function suggest(query) {
    //if the search term is empty, clear the suggestion box.
    if (query === "") {
        suggestionObj.innerHTML = "";
        return;
    }

    // if the search isn't empty, go forward
    // open an asynchronous request to the server
    xmlHttp.open("GET", base_url + "/" + media + "/suggest/" + query, true);

    //handle server's responses
    xmlHttp.onreadystatechange = function () {
        // proceed if successful
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
            // extract the JSON received from the server
            var titles = JSON.parse(xmlHttp.responseText);
            // display suggested names in a div block
            displayTitles(titles);
        }
    };

    // make the request
    xmlHttp.send(null);
}


/* This function populates the suggestion box with spans containing all the titles
 * The parameter of the function is a JSON object
 * */
function displayTitles(titles) {
    numTitles = titles.length;
    activeTitle = -1;
    if (numTitles === 0) {
        //hide all suggestions
        suggestionObj.style.display = 'none';
        return false;
    }

    var divContent = "";
    //retrive the titles from the JSON doc and create a new span for each title
    for (i = 0; i < titles.length; i++) {
        divContent += "<span id=s_" + i + " onclick='clickTitle(this)'>" + titles[i] + "</span>";
    }
    //display the spans in the div block
    suggestionObj.innerHTML = divContent;
    suggestionObj.style.display = 'block';
}

//This function handles keyup event. The function is called for every keystroke.
function handleKeyUp(e) {
    // get the key event for different browsers
    e = (!e) ? window.event : e;
        suggest(e.target.value);


}

//when a title is clicked, fill the search box with the title and then hide the suggestion list
function clickTitle(title) {
    //display the title in the search box
    searchObj.value = title.innerHTML;

    //hide all suggestions
    suggestionObj.style.display = 'none';
}