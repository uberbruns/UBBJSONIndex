<?php

/* =========== .htaccess ============ //
RewriteEngine On 
RewriteCond %{REQUEST_FILENAME} !-f 
RewriteRule ^(.*)$ autoindex.php [QSA,L]
// ================================== */

header('Content-Type: application/json');

$list = array();
$this_dir = dirname(__FILE__);
$requested_dir = realpath($_SERVER['DOCUMENT_ROOT'] . '/' . $_SERVER['REQUEST_URI']);

if (!$requested_dir || strlen($requested_dir) < strlen($this_dir) || !file_exists($requested_dir)) {
	header("Status: 404 Not Found");
	exit();
}


foreach (glob($requested_dir . '/*') as $file) {

	$file_info_resource = finfo_open(FILEINFO_MIME_TYPE);
	$mime_type = finfo_file($file_info_resource, $file);
	$stats = stat($file);

	if ($mime_type != "text/x-php") {

		$list[] = array(
			"uri" => substr($file, strlen($_SERVER['DOCUMENT_ROOT'])),
			"mime" => $mime_type,
			"mtime" => $stats["mtime"],
			"ctime" => $stats["ctime"],
			"size"  => $stats["size"],
		);

	}

}
 
print json_encode($list);

?>