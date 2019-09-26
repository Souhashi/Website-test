<?php

$currentPage = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if ($_SERVER['REQUEST_METHOD'] == "GET" && strcmp(basename($currentPage), basename(__FILE__)) == 0)
{
    http_response_code(404);
   
    die(); /* remove this if you want to execute the rest of
              the code inside the file before redirecting. */
}
$xmlDoc = simplexml_load_file("products.xml") or die("Cannot create object");


$page=$_GET["page"];
$query=$_GET["query"];
$search_params = explode(" ", $query);
$page = intval($page);
$htmlstring = '';
$num_pages = 0;
$index = 0;
$num_items = 10;
$range = $length = $num_pages =$totallength= 0;
$range = $page * $num_items;
$totallength = count($xmlDoc->product);
if($page == 1){  $index = 0;}
else{$index = $range - $num_items;}

if( !($index >=0  && $index <= $totallength -1))
{
    $page = 1;
    $range = $page * $num_items;
}

if($page == 1){  $index = 0;}
else{$index = $range - $num_items;}

function GenerateXPath($params){

    $xpathstr = "";
    if(count($params)== 1){
    $xpathstr .= 'product[benefit/@name = "' . $params[0] . '"]';
    }
    else{
        for($i = 0; $i < count($params); $i++){
            if($i == count($params) -1){$xpathstr .= 'product[benefit/@name = "' . $params[$i] . '"]';}
            else { $xpathstr .= 'product[benefit/@name = "' . $params[$i] . '"]' . ' | ';}
           
        }
    }
    return $xpathstr;
}



if(count($search_params) == 1 and ($search_params[0] == "All" or $search_params[0] == "none" or $search_params[0] == ""))
{
    $nodes = $xmlDoc->xpath('product');
    $length = $totallength;
    $num_pages = $length / $num_items;
    $num_pages = ceil($num_pages);
    

}

else {
    $xstr = GenerateXPath($search_params);
    $nodes = $xmlDoc->xpath($xstr);
    $length = count($nodes);
    $num_pages = $length / $num_items;
    $num_pages = ceil($num_pages);
    if($page > $num_pages){
        $page = 1;
    $range = $page * $num_items;
    $index = 0;
    }
    
}





$htmlstring .= '<a onclick="getPrev()">&laquo;</a>';

for($i = 0; $i < $num_pages; $i++)
{
    $pagenum = $i+1;
    if($i+1 == $page)
    {
        $htmlstring .= '<a class="active" id="p' . $pagenum .'" onclick="getProducts('. $pagenum . ')">' . $pagenum .'</a>';
    }
    else {
        $htmlstring .= '<a  id="p' . $pagenum .'"onclick="getProducts('. $pagenum . ')">' . $pagenum . '</a>';
    }


}

$htmlstring .= '<a onclick="getNext()">&raquo;</a>';
$htmlstring .="+";




for($i=$index; $i<$range; $i++)
{
    
   
    
    $htmlstring .='<div class="gcolumn">';
    $htmlstring .='<div class="pcard" id="c' . $nodes[$i]->id . '">' ;
    $htmlstring .='<div class="ocontainer">';
    $htmlstring .=' <img src ="' . $nodes[$i]->simglink . '" style="width:100%">';
    $htmlstring .='<div class="ooverlay">';
    $htmlstring .='<a href="productpage.html?p=' . $nodes[$i]->id .'" class = "icon">';
    $htmlstring .= '<i class="fas fa-search"></i></a></div></div>';
    $htmlstring .="<h4>" . $nodes[$i]->name  . "</h4>";
    $htmlstring .=" <p>" . $nodes[$i]->type . "</p>";
    
    $htmlstring .="</div>" . "</div>";
    if($i == $length-1 ){break;}

}

echo($htmlstring);

?>