<?php
# OTE CALLER ID
# g.zouzoulas v5.1

header('Content-Type: text/html; charset=utf8');
include('simple_html_dom.php');
$data="";
$name = "";
$number = $_GET['num'];
if(substr($_GET['num'],0,3) == '+30')
 {
  $number = substr($_GET['num'], -10);
 }

 //SELECT full_name FROM tbl_contacts WHERE mobile_no = '[NUMBER]'
$servername = "";
$username = "";
$password = "@s";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$mysqli =  "SELECT full_name FROM tbl_contacts WHERE mobile_no = '".$number."'";
$result = $conn->query($mysqli);
$row = $result->fetch_assoc();
$full_name = (isset($_GET['full_name']) ? $_GET['full_name'] : null);
if(!$result){
	echo 'Could not run query:' .mysqli_error();
	exit;
}


	if ($result!==NULL) {
	// h katw grammh kwdika ama ton vgaleis apo to comment trexei to value mesa sth function
	//echo strtoupper(greeklishh( $row["full_name"]));
	}
//}
	else {
		echo greeklishh( $row["full_name"]);
		
    }
	function greeklishh($result)
{ 
$greek   = array('α','ά','Ά','Α','β','Β','γ', 'Γ', 'δ','Δ','ε','έ','Ε','Έ','ζ','Ζ','η','ή','Η','θ','Θ','ι','ί','ϊ','ΐ','Ι','Ί', 
'κ','Κ','λ','Λ','μ','Μ','ν','Ν','ξ','Ξ','ο','ό','Ο','Ό','π','Π','ρ','Ρ','σ','ς', 
'Σ','τ','Τ','υ','ύ','Υ','Ύ','φ','Φ','χ','Χ','ψ','Ψ','ω','ώ','Ω','Ώ',' ',"'","'",',');
$english = array('a', 'a','A','A','b','B','g','G','d','D','e','e','E','E','z','Z','i','i','I','th','Th', 
'i','i','i','i','I','I','k','K','l','L','m','M','n','N','x','X','o','o','O','O','p','P' 
,'r','R','s','s','S','t','T','u','u','Y','Y','f','F','x','X','ps','PS','o','o','O','O',' ','_','_','_');
$string  = str_replace($greek, $english,  $result);
return $string;
} 
$conn->close();
// echo "<br />\n";

	
if ($name == NULL) {
$html = file_get_html('http://11888.ote.gr/web/guest/list-names?_wpType=number&_wpPhone='.$number);
foreach($html->find('span.title') as $e)
    $name = $e->plaintext;

    if ($name !== NULL) {
	// h katw grammh kwdika ama ton vgaleis apo to comment trexei to value mesa sth function
    //echo strtoupper(greeklish($name));
	}
} else {
     echo greeklish($name);

}
 
function greeklish($name)
{ 
$greek   = array('α','ά','Ά','Α','β','Β','γ', 'Γ', 'δ','Δ','ε','έ','Ε','Έ','ζ','Ζ','η','ή','Η','θ','Θ','ι','ί','ϊ','ΐ','Ι','Ί', 
'κ','Κ','λ','Λ','μ','Μ','ν','Ν','ξ','Ξ','ο','ό','Ο','Ό','π','Π','ρ','Ρ','σ','ς', 
'Σ','τ','Τ','υ','ύ','Υ','Ύ','φ','Φ','χ','Χ','ψ','Ψ','ω','ώ','Ω','Ώ',' ',"'","'",',');
$english = array('a', 'a','A','A','b','B','g','G','d','D','e','e','E','E','z','Z','i','i','I','th','Th', 
'i','i','i','i','I','I','k','K','l','L','m','M','n','N','x','X','o','o','O','O','p','P' 
,'r','R','s','s','S','t','T','u','u','Y','Y','f','F','x','X','ps','PS','o','o','O','O',' ','_','_','_');
$string1  = str_replace($greek, $english, $name);
return $string1;
} 


$db_custom = greeklishh( $row["full_name"]);
$db_stadar = greeklish($name);

if (!empty($db_custom)){
echo $db_custom;}
 else {
 echo $db_stadar;
}


?>