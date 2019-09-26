$(document).ready(function(){
    var query = window.location.search.substring(3);
    console.log(query);
    getProduct(query);
    
});

function getProduct(query)
{
   
    
    
    if(window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200)
        {
            var text = this.responseText.split("+");
            document.getElementById("pname").innerHTML = "";
            document.getElementById("pname").innerHTML = text[0];
            document.getElementById("properties").innerHTML = "";
            document.getElementById("properties").innerHTML = text[1];
            document.getElementById("details").innerHTML = "";
            document.getElementById("details").innerHTML = text[2];
            document.getElementById("gr").innerHTML = "";
            document.getElementById("gr").innerHTML = text[3];
            getName(1);
            
        }
    }

    xmlhttp.open("GET", "getproduct.php?p="+query, true);
    xmlhttp.send();

}

function getName(string){
    num = "im" + string;
    image = document.getElementById(num);
    name = image.alt;
    document.getElementById("ingcaption").innerHTML = name;
}

