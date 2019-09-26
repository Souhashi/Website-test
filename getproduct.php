<?php
$currentPage = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if ($_SERVER['REQUEST_METHOD'] == "GET" && strcmp(basename($currentPage), basename(__FILE__)) == 0)
{
    http_response_code(404);
    
    die(); 
}
$xmlDoc = simplexml_load_file("products.xml") or die("Cannot make object");

$product = $_GET["p"];
$htmlstring="";

function GenerateXPath($params){
    $xpathstr="";
    $xpathstr .= 'product[id = "' . $params . '"]';

    return $xpathstr;
}

$product_node = $xmlDoc->xpath(GenerateXPath($product));

if(!empty($product_node)){

$htmlstring .= '<img src="' . $product_node[0]->limglink . '">';
$htmlstring .= '<h3>' . $product_node[0]->name . '</h3>';
$htmlstring .= '+';
$benefit_string = $product_node[0]->benefit;


for($i = 0; $i < count($benefit_string); $i++)
{
    $htmlstring .= '<div class = "box"><h3>' . $benefit_string[$i] . '</h3></div>';
}
$htmlstring .= '+';

$details_string = $product_node[0]->details;
$details_string_parsed = explode("|", $details_string);

for($i = 0; $i < count($details_string_parsed); $i++)
{
    $htmlstring .= '<p>' . $details_string_parsed[$i] . '</p>';
}

$htmlstring .= '+';

$ingredients=$product_node[0]->ingredient;

for($i = 0; $i < count($ingredients); $i++)
{
    $x = $i + 1;
    $htmlstring .= '<div class="gcolumn"><div class="ingbox"><img src="' . $ingredients[$i]->ingimg . '" alt="';
    $htmlstring .= $ingredients[$i] . '" id="im' . $x . '" onclick="getName(' . $x . ')"></div></div>';
}

echo($htmlstring);
} else 
{
    echo("Error");
}

?>