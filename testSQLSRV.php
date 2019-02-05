<?php
  try {
    $hostname = "203.150.53.240";
    $port = 1533;
    $dbname = "TCT";
    $username = "sa";
    $pw = "#<93a7!?";
    $dbh = new PDO ("mssql:host=$hostname:$port;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }
  $stmt = $dbh->prepare("select top 20 isnull(CONVERT(varchar(20),SODate,105),'')as SOdate ,isnull(SONo,'') as SONo,isnull(customername,'') 
as customername,
isnull(CONVERT(varchar, CAST(TotalAmountAfterVATBaht AS money), 1),'') as TotalAmountAfterVATBaht,
isnull(Runno,'') as Runno,isnull(DocumentTypeCode,'')as DocumentTypeCode  from SalesOrderHeader
order by SONo Desc");
  $stmt->execute();
  while ($row = $stmt->fetch()) {
    print_r($row);
  }
  unset($dbh); unset($stmt);
?>
