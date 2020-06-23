<!DOCTYPE html>
<html lang="en">
<head>
  <title>COVID19 Monitor</title>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
      h1,h2,h3,h4,h5,h6{
          margin:0px;
          padding:0px;
      }
     #covid{
          margin-bottom: 48px;
      }
  </style>
</head>
<body>
  
<div class="w3-row" id="covid">
    <div class="w3-col m1">&nbsp;</div>
    <div class="w3-col m11">
  <h1>Worldwide Covid19 Statistics</h1>  
</div>
</div>



      

 <div class="w3-row">
<div class="w3-third w3-container">
<p>This is a collection of data taken over time and updated daily by the team at 
<a href="https://rapidapi.com/api-sports/api/covid-193">Covid-19 API</a>.</p>

<p>It's 
100% free and always being updated and worked on. The numbers seem pretty good
to me, its versatile, but it can take a bit to load.</p>
<p>
    Check out my <a href="http://disorganizeddatabase.com/covid">Visual Covid19 Case App</a>.
</p>
</div>
<div class="w3-third w3-container">
<div id="demo"></div>
</div>
<div class="w3-third w3-container">
<div id="cards"></div>
</div>

</div>


<p id="datab"></p>
<p id="opti"></p>


 <script type="text/javascript" language="javascript">
 $(document).ready(function () {
 var data = null;

var request = new XMLHttpRequest();
var xhr = new XMLHttpRequest();
xhr.withCredentials = true;


xhr.addEventListener("readystatechange", function () {
	if (this.readyState === this.DONE) {
		console.log(this.responseText);
	
	}
});

xhr.open("GET", "https://covid-193.p.rapidapi.com/statistics");
xhr.setRequestHeader("x-rapidapi-host", "covid-193.p.rapidapi.com");
xhr.setRequestHeader("x-rapidapi-key", "");

xhr.send(data);
});

var obj, dbParam, xmlhttp, myObj, i, x, txt = "";
obj = { table:"statistics", limit: 300};
dbParam = JSON.stringify(obj);
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
myObj = JSON.parse(this.responseText);
 var result = [];
txt += "<select class='w3-select' id='myselect' onchange='change_myselect(this.value)'>"
 // select the value from the clicked select
for (i in myObj.response) {
    
 txt += "<option  value=" + myObj.response[i].country + "/>" + myObj.response[i].country + "</option>"
  }
      txt += "</select>";
// option value
//var optval = alert(myObj.response[i].country);
      document.getElementById("demo").innerHTML = txt;
// result.push(myObj.response[i].country);
  }

}

xmlhttp.open("GET", "https://covid-193.p.rapidapi.com/statistics", true);
xmlhttp.setRequestHeader("x-rapidapi-host", "covid-193.p.rapidapi.com");
xmlhttp.setRequestHeader("x-rapidapi-key", "");
xmlhttp.send("i=" + dbParam);

function change_myselect(sel) {
    // var sel_country = sel;
  //  alert(sel_country);
      var x = document.getElementById("myselect").selectedIndex;
        var y = document.getElementById("myselect").options;
var in_num = (y[x].index);
//alert(in_num);
var obj, dbParam, xmlhttp, myObj, i, x, txt = "";
  obj = { table: sel, limit: 5 };
 
  dbParam = JSON.stringify(obj);

  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myObj = JSON.parse(this.responseText);
// temp remove loop
 //for (i in myObj.response) {
  i = (y[x].index);
txt += "<div class='w3-container' id=" + myObj.response[i].country + "/>"
      txt += "<table border='1'>"
   
   //  for (i=(y[x].index); myObj.response; i+=1) {

                   

           txt += "<table border='0' cellspacing='2' cellpadding='2'>"
          txt += "<tr><td colspan='2'><h2>" + myObj.response[i].country + "</h2></td></tr>"
        txt += "<tr><td valign='center'><h3>Cases: </h3>"
     txt += "<ul><li><h4><strong>New</strong> " + myObj.response[i].cases.new + "</h4></li>"
         txt += "<li><h4><strong>Active</strong>  " + myObj.response[i].cases.active + "</h4></li>"
            txt += "<li><h4><strong>Critical</strong>  " + myObj.response[i].cases.critical + "</h4></li>"
                txt += "<li><h4><strong>Recovered</strong>  " + myObj.response[i].cases.recovered + "</h4></li>"
        txt += "</ul></td><td>"
    txt += "<h2>Total Tested </h2><h1>"
               txt += myObj.response[i].tests.total + "</h1>"
               txt += "<ul><li><h4><strong>Deaths</strong> " + myObj.response[i].deaths.total + "</h4></li>"
               txt += "<li><h4><strong>New Deaths </strong>" + myObj.response[i].deaths.new + "</h4></li></ul></td></tr>";
     }
      txt += "</table></div>"
    
      
                document.getElementById("cards").innerHTML = txt;
}
      
  
  xmlhttp.open("GET", "https://covid-193.p.rapidapi.com/statistics", true);
xmlhttp.setRequestHeader("x-rapidapi-host", "covid-193.p.rapidapi.com");
xmlhttp.setRequestHeader("x-rapidapi-key", "");
xmlhttp.send("i=" + dbParam);

}


</script>
  
  
    </body>
    </html>
