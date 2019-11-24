//Multiplication (https://stackoverflow.com/questions/21223164/multiplying-two-inputs-with-javascript-displaying-in-text-box)
function calculate() {
	var myBox1 = document.getElementById('box1').value;
	var myBox2 = document.getElementById('box2').value;
	var result = document.getElementById('result');
	var myResult = myBox1 * myBox2;
	document.getElementById('result').value = myResult/1000000;

}

window.onscroll = function() {myFunction()};
var navbar = document.getElementById("nav");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

function genSelected(val) {
	var generator = document.getElementById("generator").value;
	var text = ""
	if (generator == "clasdis") {
		document.getElementById("generatorLink").getElementsByTagName('a')[0].href='https://github.com/JeffersonLab/clasdis-nocernlib/blob/master/README.md';
		document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML='clasdis options';
	} else if (generator == "dvcs") {
		document.getElementById("generatorLink").getElementsByTagName('a')[0].href='https://github.com/JeffersonLab/dvcsgen/blob/master/README.md';
		document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML='dvcs options';

	} else if (generator == "disrad") {
		document.getElementById("generatorLink").getElementsByTagName('a')[0].href='https://github.com/JeffersonLab/inclusive-dis-rad/blob/master/README.md';
		document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML='disrad options';

	} else if (generator == "genKYandOnePion") {
		document.getElementById("generatorLink").getElementsByTagName('a')[0].href='https://github.com/ValeriiKlimenko/genKYandOnePion';
		document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML='genKYandOnePion options';

	} else if (generator == "gemc") {
		document.getElementById("generatorLink").getElementsByTagName('a')[0].href='https://gemc.jlab.org/gemc/html/documentation/generator/internal.html';
		document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML='gemc generator options';

	}
}

function farmStatstoTable() {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
		    var myObj = JSON.parse(this.responseText);
		    //set up table
		    var txt = "<table style=\"width:100%;text-align:center\"><caption style=\"text-align:right\" align=\"top\">";
		    //top caption from timestamp
		    txt += "updated on "+myObj[0]["timestamp"];
		    txt += "</caption><tr>";
		    // // first row from keys
   		    var keys = Object.keys(myObj);
   		    txt += "<th>Farm Name</th>"
   		    txt += "<th>Total Available Cores</th>"
   		    txt += "<th>Busy Cores</th>"
   		    txt += "<th>Idle Cores</th></tr>"
		    // // data rows
			    for (index=0;index<1;index++){
			    	var farmstat = myObj[index];
			    	for (newkeys in farmstat){
			    		if (newkeys!="timestamp"){
					    	txt+="<td>";
					    	txt+=farmstat[newkeys];
					    	txt+="</td>";
				    	}
			    	}
			    	txt+="</tr>"
		    	}
		    	txt+="</table>";

		  }
		  document.getElementById("farmStats").innerHTML = txt;

		};
		xmlhttp.open("GET", "stats_results/stats.json", true);
		xmlhttp.send();
}


function osgLogtoTable() {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
		    var myObj = JSON.parse(this.responseText);
		    //set up table
		    var txt = "<table style=\"width:100%;text-align:center\"><caption align=\"bottom\">"
		    //bottom caption from metadata
		    var meta = myObj.metadata;
		    txt += meta["jobs"]+" jobs, ";
		    txt += meta["completed"]+" completed, ";
		    txt += meta["idle"]+" idle, ";
		    txt += meta["running"]+" running, ";
		    txt += meta["held"]+" held, ";
		    txt += "updated on "+meta["update_timestamp"];
		    txt+= "</caption><tr>";
		    // first row from keys
   		    var keys = Object.keys(myObj.user_data[0]);
		    for (i=0; i<keys.length; i++){
		    	txt+="<th>";
		    	txt+=keys[i];
		    	txt+="</th>";
		    }
		    // data rows
		    for (rows=0; rows<myObj.user_data.length;rows++){
		    	txt+="</tr><tr>";
		    	var val = myObj.user_data[rows];
			    for (var newkeys in val){
			    	txt+="<td>";
			    	txt+=val[newkeys];
			    	txt+="</td>";
			    }
			    if (val.username == username){
			    	txt+="<td>cancel</td>"
			    }
		    }
		    txt+="</tr></table>";
		    document.getElementById("osgLog").innerHTML = txt;
		  }
		};
		xmlhttp.open("GET", "stats_results/osgLog.json", true);
		xmlhttp.send();
}

function diskUsagetoTable() {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
		    var myObj = JSON.parse(this.responseText);
		    //set up table
		    var txt = "<table style=\"width:100%;text-align:center\"><tr><th>Name</th><th>Disk Usage</th></tr>";
   		    for (var user in myObj){
   		    	txt+="<tr><td>"+user+"</td>";
   		    	txt+="<td>"+myObj[user].total_size+"</td></tr>"
   		    	if(user==username){
   		    		txt+="<td>details</td>"
   		    	}
   		    }
		    txt+="</table>";
		    document.getElementById("du").innerHTML = txt;
		  }
		};
		xmlhttp.open("GET", "stats_results/disk.json", true);
		xmlhttp.send();
}


function max_events(checkboxElem) {
	var jobs = document.getElementById('box1');
	if(document.getElementById('gemcEvioOUT').checked || document.getElementById('generatorOUT').checked || document.getElementById('gemcHipoOUT').checked || document.getElementById('reconstructionOUT').checked)
		jobs.max = "100";
	else jobs.removeAttribute('max')
			}