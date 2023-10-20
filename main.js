//Multiplication (https://stackoverflow.com/questions/21223164/multiplying-two-inputs-with-javascript-displaying-in-text-box)
function calculate() {
    var myBox1 = document.getElementById('box1').value;
    var myBox2 = document.getElementById('box2').value;
    var result = document.getElementById('result');
    var myResult = myBox1 * myBox2;
    document.getElementById('result').value = myResult / 1000000;

}

window.onscroll = function () {
    myFunction()
};
var navbar = document.getElementById("nav");
var sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}

var is_test = window.location.pathname.includes("test");
var title = "CLAS12 Monte-Carlo Job Submission Portal";
if (is_test) {
    title = title + " (Test Version)";
}
document.getElementById('title').innerHTML = title;

function genSelected(val) {
    var generator = document.getElementById("generator").value;

    if (generator == "clasdis") {
        document.getElementById("generatorLink").getElementsByTagName('a')[0].href = 'https://github.com/JeffersonLab/clasdis-nocernlib/blob/master/README.md';
        document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML = 'clasdis options';

    } else if (generator == "claspyth") {
        document.getElementById("generatorLink").getElementsByTagName('a')[0].href = 'https://github.com/JeffersonLab/claspyth/blob/master/README.md';
        document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML = 'claspyth options';

    } else if (generator == "dvcsgen") {
        document.getElementById("generatorLink").getElementsByTagName('a')[0].href = 'https://github.com/JeffersonLab/dvcsgen/blob/master/README.md';
        document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML = 'dvcsgen options';

    } else if (generator == "genKYandOnePion") {
        document.getElementById("generatorLink").getElementsByTagName('a')[0].href = 'https://github.com/ValeriiKlimenko/genKYandOnePion/blob/master/README.md';
        document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML = 'genKYandOnePion options';

    } else if (generator == "MCEGENpiN_radcorr") {
        document.getElementById("generatorLink").getElementsByTagName('a')[0].href = 'https://github.com/Maksaska/MCEGENpiN_radcorr#readme';
        document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML = 'MCEGENpiN_radcorr options';

    } else if (generator == "inclusive-dis-rad") {
        document.getElementById("generatorLink").getElementsByTagName('a')[0].href = 'https://github.com/JeffersonLab/inclusive-dis-rad/blob/master/README.md';
        document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML = 'disrad options';

    } else if (generator == "JPsiGen") {
        document.getElementById("generatorLink").getElementsByTagName('a')[0].href = 'https://github.com/JeffersonLab/JPsiGen/blob/master/README.md';
        document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML = 'JPsiGen options';

    } else if (generator == "TCSGen") {
        document.getElementById("generatorLink").getElementsByTagName('a')[0].href = 'https://github.com/JeffersonLab/TCSGen/blob/master/README.md';
        document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML = 'TCSGen options';

    } else if (generator == "twopeg") {
        document.getElementById("generatorLink").getElementsByTagName('a')[0].href = 'https://github.com/skorodumina/twopeg/blob/main/README.md';
        document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML = 'twopeg options';

    } else if (generator == "clas12-elSpectro") {
        document.getElementById("generatorLink").getElementsByTagName('a')[0].href = 'https://github.com/dglazier/clas12-elSpectro/wiki/Running-on-OSG';
        document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML = 'clas12-elSpectro options';

    } else if (generator == "deep-pipi-gen") {
        document.getElementById("generatorLink").getElementsByTagName('a')[0].href = 'https://github.com/jeffersonlab/deep-pipi-gen/';
        document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML = 'deep-pipi-gen options';

    } else if (generator == "genepi") {
        document.getElementById("generatorLink").getElementsByTagName('a')[0].href = 'https://github.com/N-Plx/genepi/tree/OSG';
        document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML = 'genepi options';

    } else if (generator == "onepigen") {
        document.getElementById("generatorLink").getElementsByTagName('a')[0].href = 'https://github.com/tylern4/onepigen';
        document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML = 'onepigen options';

    } else if (generator == "gemc") {
        document.getElementById("generatorLink").getElementsByTagName('a')[0].href = 'https://gemc.jlab.org/gemc/html/documentation/generator/internal.html';
        document.getElementById("generatorLink").getElementsByTagName('a')[0].innerHTML = 'gemc generator options';
    }

}

// The configuration is read from data/xrootd
function configurationSelected() {

    var text = "<option selected hidden value=\"\"></option>";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            for (experiments in myObj) {
                text += "<option value=\"" + experiments + "\">" + experiments + "</option>";
            }
            document.getElementById("configuration").innerHTML = text;
        }
    };
    xmlhttp.open("GET", "data/setup.json", true);
    xmlhttp.send();

}


function fieldSelected() {
    var selected_experiment = document.getElementById("configuration").value;

    var text = "<option selected hidden value=\"\"></option>";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);

            if (selected_experiment in myObj) {

                var keys_field = Object.keys(myObj[selected_experiment]);

                for (key in keys_field) {
                    if (keys_field[key].includes("tor")) {
                        text += "<option value=\"" + keys_field[key] + "\">" + keys_field[key] + "</option>";
                    }
                }

            }
            document.getElementById("fields").innerHTML = text;
        }
    };
    xmlhttp.open("GET", "data/setup.json", true);
    xmlhttp.send();
}

function vertexSelected() {

    var selected_experiment = document.getElementById("configuration").value;
    var textz = "";
    var textr = "";
    var texts = "";

    var selected_softwareversion = document.getElementById("softwarev").value;
    // exit if selected_softwareversion is "gemc/4.4.2 coatjava/6.5.9 (pass1 rgb)"


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            var myObj = JSON.parse(this.responseText);

            if (selected_experiment in myObj) {

                var zpos = myObj[selected_experiment]["z-position"];
                var rast = myObj[selected_experiment]["raster"];
                var bspot = myObj[selected_experiment]["beam_spot"];

                if (document.getElementById("zposition-check").checked) {
                    textz = zpos[0];
                } else {
                    textz = "";
                }
                if (document.getElementById("raster-check").checked) {
                    textr = rast[0];
                } else {
                    textr = "";
                }
                if (document.getElementById("beamspot-check").checked) {
                    texts = bspot[0];
                } else {
                    texts = "";
                }

            } else {
                text = "";
            }
            document.getElementById("zposition-show").value = textz;
            document.getElementById("raster-show").value = textr;
            document.getElementById("beamspot-show").value = texts;


            // if textz textr texts are empty, hide the vertex radio buttons
            if (textz == "" && textr == "" && texts == "") {
                document.getElementById("vertex_user_selection").style.display = "none";
            } else {
                document.getElementById("vertex_user_selection").style.display = "block";
            }

            if (selected_softwareversion == "gemc/4.4.2 coatjava/6.5.9" || selected_softwareversion == "gemc/4.4.2 coatjava/6.5.6.1") {
                document.getElementById("zposition-check").style.display = "none";
                document.getElementById("raster-check").style.display = "none";
                document.getElementById("beamspot-check").style.display = "none";
                document.getElementById("vertex_user_selection").style.display = "none";
                document.getElementById("zposition-show").value = "n/a";
                document.getElementById("raster-show").value = "n/a";
                document.getElementById("beamspot-show").value = "n/a";

            } else {
                document.getElementById("zposition-check").style.display = "inline";
                document.getElementById("raster-check").style.display = "inline";
                document.getElementById("beamspot-check").style.display = "inline";
                document.getElementById("vertex_user_selection").style.display = "inline";
            }
            if (textz == "") {
                document.getElementById("zposition-show").value = "n/a";
            }
            if (textr == "") {
                document.getElementById("raster-show").value = "n/a";
            }
            if (texts == "") {
                document.getElementById("beamspot-show").value = "n/a";
            }
        }
    };
    xmlhttp.open("GET", "data/setup.json", true);
    xmlhttp.send();


}


function update_gemc_coatjava_versions() {

    var default_val = "gemc/5.4 coatjava/10.0.2";
    var text = "<option selected  value=\" " + default_val + "\">" + default_val + "</option>";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            var myObj = JSON.parse(this.responseText);
            var vals = myObj["software_versions"];

            for (val in vals) {
                if (vals[val] == default_val) continue;
                text += "<option  value=\"" + vals[val] + "\">" + vals[val] + "</option>";
            }

            document.getElementById("softwarev").innerHTML = text;
        }
    };
    xmlhttp.open("GET", "data/software_versions.json", true);
    xmlhttp.send();
}

function update_mcgen_versions() {

    var default_val = "2.33";
    var text = "<option selected  value=\" " + default_val + "\">" + default_val + "</option>";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            var myObj = JSON.parse(this.responseText);
            var vals = myObj["mcgen_versions"];

            for (val in vals) {
                if (vals[val] == default_val) continue;
                text += "<option  value=\"" + vals[val] + "\">" + vals[val] + "</option>";
            }

            document.getElementById("mcgenv").innerHTML = text;
        }
    };
    xmlhttp.open("GET", "data/software_versions.json", true);
    xmlhttp.send();
}

function bkmergingSelected() {
    var experiments = document.getElementById("configuration").value;
    var fields = document.getElementById("fields").value;
    var text = "<option selected  value=\"no\"> Not Available </option>";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            if (experiments in myObj) {
                var vals = myObj[experiments][fields];
                text = "<option selected  value=\"no\"> No </option>";
                for (val in vals) {
                    text += "<option value=\"" + vals[val] + "\">" + vals[val] + "</option>";
                }
            }
            document.getElementById("bkmerging").innerHTML = text;
        }
    };
    xmlhttp.open("GET", "data/setup.json", true);
    xmlhttp.send();
}

function osgLogtoTable() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            //set up table
            var txt = "<table align=\"center\" style=\"width:80%;text-align:center\"><caption align=\"bottom\">";
            var txt_summary = "<table align=\"center\" style=\"width:50%;text-align:center\"><tr>";
            //bottom caption from metadata
            var meta = myObj.metadata;
            txt += meta["footer"];
            txt += "</caption><tr>";
            // first row from keys
            let data_summary = {"user": [], "submission": [], "total": [], "done": [], "run": [], "idle": []};
            var keys = Object.keys(myObj.user_data[0]);
            for (i in keys) {
                txt += "<th>";
                txt += keys[i];
                txt += "</th>";
            }
            for (i in Object.keys(data_summary)) {
                txt_summary += "<th>";
                txt_summary += Object.keys(data_summary)[i];
                txt_summary += "</th>";
            }
            // data rows
            for (rows in myObj.user_data) {
                txt += "</tr><tr>";
                var val = myObj.user_data[rows];
                for (var newkeys in val) {
                    txt += "<td>";
                    txt += val[newkeys];
                    txt += "</td>";
                }

//			    if (val.user == username){
//			    	txt+="<td>yours</td>"
//			    }

                //summary part
                if (data_summary.user.includes(val.user)) {
                    for (i in Object.keys(data_summary)) {
                        if (i < 2) continue;
                        data_summary[Object.keys(data_summary)[i]][data_summary.user.indexOf(val.user)] = Number(data_summary[Object.keys(data_summary)[i]][data_summary.user.indexOf(val.user)]);
                        data_summary[Object.keys(data_summary)[i]][data_summary.user.indexOf(val.user)] += Number(val[Object.keys(data_summary)[i]]);
                    }
                    data_summary["submission"][data_summary.user.indexOf(val.user)] += 1;
                } else {
                    for (i in Object.keys(data_summary)) {
                        if (i == 1) continue;
                        data_summary[Object.keys(data_summary)[i]].push(val[Object.keys(data_summary)[i]]);
                    }
                    data_summary["submission"].push(1);
                }

            }
            txt += "</tr></table>";

            for (i in data_summary.user) {
                txt_summary += "</tr><tr>";
                for (j in Object.keys(data_summary)) {
                    txt_summary += "<td>";
                    txt_summary += data_summary[Object.keys(data_summary)[j]][i];
                    txt_summary += "</td>";
                }
            }

            txt_summary += "<tr><td>total</td>";
            for (j in Object.keys(data_summary)) {
                if (j == 0) continue;
                txt_summary += "<td>";
                txt_summary += data_summary[Object.keys(data_summary)[j]].reduce((a, b) => Number(a) + Number(b), 0);
                txt_summary += "</td>";
            }

            txt_summary += "</tr></table>";
            document.getElementById("osgLog").innerHTML = txt;
            document.getElementById("osgLog_summary").innerHTML = txt_summary;
        }
    };
    xmlhttp.open("GET", "data/osgLog.json", true);
    xmlhttp.send();
}

function diskUsagetoTable() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            //set up table
            var txt = "<table align=\"center\" style=\"width:60%;text-align:center\"><tr><th>Name</th><th>Disk Usage</th></tr>";
            for (var user in myObj) {
                txt += "<tr><td>" + user + "</td>";
                txt += "<td>" + myObj[user].total_size + "</td>"
                if (user == username) {
                    txt += "<td><details><summary>details</summary>";
                    txt += "<div class=\"w3-center\"><form action=\"condorrm.php\" method=\"POST\">";
                    for (var index in myObj[username]["sub_directories"]) {
                        var nameandsize = myObj[username]["sub_directories"][index];
                        for (var keys in nameandsize) {
                            if (keys == "name") {
                                txt += "<input type=\"checkbox\" name=\"" + nameandsize[keys] + "\">";
                            }
                            txt += keys + ": " + nameandsize[keys] + "  ";
                        }
                        txt += "<br>";
                    }
                    txt += "<input type=\"submit\" value=\"cancel\">";
                    txt += "</form>";
                    txt += "</div></details></td>";
                    txt += "</tr>";
                }
            }
            txt += "</table>";
            document.getElementById("du").innerHTML = txt;
        }
    };
    xmlhttp.open("GET", "data/disk.json", true);
    xmlhttp.send();
}


function max_events(checkboxElem) {
    var jobs = document.getElementById('box1');
    if (document.getElementById('gemcEvioOUT').checked || document.getElementById('generatorOUT').checked || document.getElementById('gemcHipoOUT').checked || document.getElementById('reconstructionOUT').checked)
        jobs.max = "100";
    else jobs.removeAttribute('max')
}

function resizable(el, factor) {
    var int = Number(factor) || 7.7;

    function resize() {
        if (el) {
            el.style.width = ((el.value.length + 1) * int) + 'px'
        }
    }

    var e = 'keyup,keypress,focus,blur,change'.split(',');


    for (var i in e) {
        if (el) {
            el.addEventListener(e[i], resize, false);
        }

    }


    resize();
}

resizable(document.getElementById('genOptions'), 7);
