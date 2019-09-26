<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    /* 
       Up to you which header to send, some prefer 404 even if 
       the files does exist for security
    */
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

    /* choose the appropriate page to redirect users */
    die( header( 'location: /error.php' ) );

}
$xmlDoc = simplexml_load_file("benefits.xml") or die("Cannot load object");

$ingredients = $xmlDoc->xpath('benefit');
$htmlstr = "";

for($i = 0; $i < count($ingredients); $i++)
{
    $htmlstr .= '<li><label class="containerl">' . $ingredients[$i] . '<input type="checkbox" id="' ;
    $htmlstr .= $ingredients[$i]->attributes()->{'name'} . '" onclick="getProducts(1)" >';
    $htmlstr .= '<span class="checkmark"></span></label></li>';
}

echo $htmlstr;
?>