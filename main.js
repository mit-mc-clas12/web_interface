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

function fieldSelected() {
	var experiments = document.getElementById("experiments").value;
	var text = "";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
			var myObj = JSON.parse(this.responseText);
			var keys_field = Object.keys(myObj[experiments]);
			for (key in keys_field){
				text += "<option value=\""+keys_field[key]+"\">"+keys_field[key]+"</option>";
			}
			document.getElementById("fields").innerHTML= text;
		}
	};
	xmlhttp.open("GET", "xrootd/xrootd.json", true);
	xmlhttp.send();
}

function currentenergySelected() {
	var experiments = document.getElementById("experiments").value;
	var fields = document.getElementById("fields").value;
	var text = "";
	text += "<option selected hidden value=\"\"></option>"
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
			var myObj = JSON.parse(this.responseText);
			var vals  = myObj[experiments][fields];
			for (val in vals){
				text += "<option value=\""+vals[val]+"\">"+vals[val]+"</option>";
			}
			document.getElementById("currentenergy").innerHTML= text;
		}
	};
	xmlhttp.open("GET", "xrootd/xrootd.json", true);
	xmlhttp.send();
}


function bkg_rows() {
	var e = document.getElementById("bkg_merging").value;
	var table = document.getElementById("submission_table");
	var row1 = table.insertRow(8);
	var row2 = table.insertRow(9);
	var row3 = table.insertRow(10);
	if (e == "yes"){
		var cell_exp = row1.insertCell(0);
		var cell_exp_options = row1.insertCell(1);
		var cell_field = row2.insertCell(0);
		var cell_field_options = row2.insertCell(1);
		var cell_currentenergy = row3.insertCell(0);
		var cell_currentenergy_options = row3.insertCell(1);
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
			var myObj = JSON.parse(this.responseText);
			var keys = Object.keys(myObj);
			var txt_exp = ""
			var keys_field;
			cell_exp.innerHTML = "Experimental Setup";
			txt_exp += "<select name=\"experiments\" id =\"experiments\" onchange=\"fieldSelected();\">"
			for (key in keys){
				txt_exp += "<option value=\""+keys[key]+"\">"
				txt_exp += keys[key];
				txt_exp += "</option>"
			}
			txt_exp += "</select>"
			cell_exp_options.innerHTML = txt_exp;
			cell_field.innerHTML = "Fields Setup";
			keys_field = Object.keys(myObj["rga_fall2018"])
			var txt_field= "<select name=\"fields\" id =\"fields\">"
			for (key in keys_field){
				txt_field += "<option value=\""+keys_field[key]+"\">"
				txt_field += keys_field[key];
				txt_field += "</option>"
			}
			txt_field += "</select>"
			cell_field_options.innerHTML = txt_field;
			cell_currentenergy.innerHTML = "Current/ Energy";
			var vals = myObj["rga_fall2018"]["tor-1.00_sol-1.00"];
			var txt_currentenergy ="<select name=\"currentenergy\" id =\"currentenergy\"  onclick =\"currentenergySelected()\">"
			txt_currentenergy += "<option selected hidden value=\"\"></option>"
			for (val in vals){
				txt_currentenergy += "<option value=\""+vals[val]+"\">"
				txt_currentenergy += vals[val];
				txt_currentenergy += "</option>"
			}
			txt_currentenergy += "</select>"
			cell_currentenergy_options.innerHTML = txt_currentenergy;
		  }
		};
		xmlhttp.open("GET", "xrootd/xrootd.json", true);
		xmlhttp.send();

	}
	else if (e == "no"){
		table.deleteRow(11)
		table.deleteRow(11)
		table.deleteRow(11)
	}
}

function farmStatstoTable() {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
		    var myObj = JSON.parse(this.responseText);
		    //set up table
		    var txt = "<table align=\"center\" style=\"width:100%;text-align:center\"><caption style=\"text-align:right\" align=\"top\">";
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
		    var txt = "<table align=\"center\" style=\"width:100%;text-align:center\"><caption align=\"bottom\">"
		    //bottom caption from metadata
		    var meta = myObj.metadata;
		    txt+= meta["footer"];
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
//			    if (val.username == username){
//			    	txt+="<td>yours</td>"
//			    }
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
		    var txt = "<table align=\"center\" style=\"width:60%;text-align:center\"><tr><th>Name</th><th>Disk Usage</th></tr>";
   		    for (var user in myObj){
   		    	txt+="<tr><td>"+user+"</td>";
   		    	txt+="<td>"+myObj[user].total_size+"</td>"
                        if(user==username){
                                txt+="<td><details><summary>details</summary>";
                                txt+="<div class=\"w3-center\"><form action=\"condorrm.php\" method=\"POST\">";
                                for (var index in myObj[username]["sub_directories"]){
                                        var nameandsize = myObj[username]["sub_directories"][index];
                                        for (var keys in nameandsize){
                                                if (keys=="name"){
                                                        txt+="<input type=\"checkbox\" name=\""+nameandsize[keys]+"\">";
                                                }
                                                txt+=keys+": "+nameandsize[keys]+"  ";
                                        }
                                        txt+="<br>";
                                }
	                        txt+="<input type=\"submit\" value=\"cancel\">";
	                        txt+="</form>";
	                        txt+="</div></details></td>";
	                        txt+="</tr>";
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
