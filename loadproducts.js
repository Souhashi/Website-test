$(document).ready(function(){
    console.log("fire");
    getIngredientList();
    getProducts(1);
    
});


function getProducts(num)
{
    document.getElementById("pa").innerHTML = "";
    document.getElementById("pg").innerHTML = "";
    
    
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
            document.getElementById("pg").innerHTML = text[0];
            document.getElementById("pa").innerHTML= text[1];
           
            getSelected();
        }
    }

    xmlhttp.open("GET", "loadproducts.php?page="+num+"&query="+getSelected(), true);
    xmlhttp.send();

}

function getIngredientList()
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
            document.getElementById("inglist").innerHTML = "";
            document.getElementById("inglist").innerHTML = this.responseText;
           
        }
    }

    xmlhttp.open("POST", "loadingredients.php", true);
    xmlhttp.send();

}

function getSelected()
{
    var buttons = document.querySelectorAll("input[type=checkbox]");
    //console.log(buttons);
    var i;
    var querystring = "";
    for(i = 0; i < buttons.length; i++){
        if(buttons[i].checked == true)
        {
            
            if(i == buttons.length -1){querystring +=buttons[i].id;}
            else{querystring +=buttons[i].id+" ";}
            
        }
    }
    return querystring;
}

function getNext(){
    var active_node = document.querySelector(".active");
    var id = active_node.id.substring(1)
    var num = parseInt(id)
    getProducts(num+1);
    console.log(num);
}

function getPrev(){
    var active_node = document.querySelector(".active");
    var id = active_node.id.substring(1)
    var num = parseInt(id)
    getProducts(num-1);
    console.log(num);
}