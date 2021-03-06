<?php
$db = new PDO('sqlite:data.sqlite');

$sql = "SELECT		com.id AS id,
			com.name AS name,
			com.type,
			comTyp.name AS type_name,
			comTyp.category AS category,
			typCat.name AS category_name,
			website,
			address,
			lat,
			lng
	FROM company AS com
	INNER JOIN companyType AS comTyp
		ON com.type=comTyp.id
	INNER JOIN typeCategory AS typCat
		ON comTyp.category=typCat.id
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