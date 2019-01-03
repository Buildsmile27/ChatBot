<?php
echo 'query'

	
ini_set('mssql.charset', 'UTF-8');


$ini_array = parse_ini_file("config.ini",false, INI_SCANNER_RAW);


$username=$ini_array["UID"];

$password=$ini_array["PWD"];

$database=$ini_array["PACKAGE"];
$serverName = $ini_array["serverName"];
$connectionInfo = array( "Database"=>$database, "UID"=>$username, "PWD"=>$password, "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo );

if( $conn === false ) {
    
die( print_r( sqlsrv_errors(), true));

}

//$sql="select 'x'";

$sql = "select top 20 isnull(CONVERT(varchar(20),SODate,105),'')as SOdate ,isnull(SONo,'') as SONo,isnull(customername,'') 
as customername,
isnull(CONVERT(varchar, CAST(TotalAmountAfterVATBaht AS money), 1),'') as TotalAmountAfterVATBaht,

isnull(Runno,'') as Runno,isnull(DocumentTypeCode,'')as DocumentTypeCode  from SalesOrderHeader
order by SONo Desc";


$stmt = sqlsrv_query( $conn, $sql );

$result = array(); 


do {
     while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) 
{
     $result[]= $row;
	
     }
} while ( sqlsrv_next_result($stmt) );





sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);



//print_r ($result);

echo  Json_encode($result)











while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
{
      echo $row['RunNo'].", ".$row['CustomerCode']."<br />";
}


sqlsrv_free_stmt( $stmt);*/
?>
