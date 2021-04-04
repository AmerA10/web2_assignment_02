<?php 
//require_once 'includes/config.inc.php'; 
require_once 'includes/db-classes.inc.php';
require_once 'includes/helpers.inc.php'; 
require_once 'includes/stock-config.inc.php';
 
// Tell the browser to expect JSON rather than HTML
header('Content-type: application/json'); 
// indicate whether other domains can use this API
header("Access-Control-Allow-Origin: *"); 
 
try { 
    //$conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS)); 
    $companies = null;
    $gateway = new CompanyDB($connection);
    
    if(isset($_GET["symbol"]) && isCorrectQueryStringInfo($_GET["symbol"])) {
        
        $companies = $gateway->getAllForCompany($_GET["symbol"]); 
    }  
    else  
        $companies = $gateway->getAll(); 
 
    echo json_encode( $companies, JSON_NUMERIC_CHECK );
    
} catch (Exception $e) {   
    die( $e->getMessage() ); 
} 

function isCorrectQueryStringInfo($param) { 
    if ( isset($_GET[$param]) && !empty($_GET[$param]) ) { 
        return true; 
    } else { 
        return false; 
    } 
} 
?> 