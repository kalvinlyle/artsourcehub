<?php
$db = new PDO('sqlite:data.sqlite');

$sql = "SELECT company.id as id, company.name as name, company.type, companyType.name as type_name, website, address, lat, lng
	FROM company
	INNER JOIN companyType ON company.type=companyType.id
	WHERE lat IS NOT NULL AND lat <> '' AND status>=0;";
error_log($sql);
$rs = $db->query($sql);
if (!$rs) {
    echo "An SQL error occured.\n";
    exit;
}

$rows = array();
while($r = $rs->fetch(PDO::FETCH_ASSOC)) {
    $rows[] = $r;
}
print json_encode($rows);
$db = NULL;

?>