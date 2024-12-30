<?php

error_reporting(-1);
ini_set('display_errors', 1);
ini_set('html_errors', 0);

header('Content-Type: text/plain; charset=utf-8');

require_once __DIR__ . '/../src/Soap.php';
require_once __DIR__ . '/../src/Config.php';
require_once __DIR__ . '/../src/Payload.php';
require_once __DIR__ . '/../src/Handler.php';

if (!file_exists('../.env')) {
    throw new RuntimeException('.env file missing');
}

$config = parse_ini_file('../.env', false, INI_SCANNER_TYPED);

// Initialize the $request array
$request = [];

// Get auth info
$auth_user = $_SERVER['PHP_AUTH_USER'] ?? null;
$auth_pw = $_SERVER['PHP_AUTH_PW'] ?? null;

// Populate the $request array
$request['user'] = $auth_user ?: 'Not provided';
$request['password'] = $auth_pw ?: 'Not provided';
$request['domain'] = $_GET['hostname'] ?? 'Not provided';

// Handle IP addresses
if (isset($_GET['myip'])) {
    $ips = explode(',', $_GET['myip']);
    if (count($ips) >= 2) {
        $request['ipv6'] = $ips[0];
        $request['ipv4'] = $ips[1];
    } elseif (count($ips) == 1) {
        // If only one IP is provided, assume it's IPv4
        $request['ipv4'] = $ips[0];
        $request['ipv6'] = 'Not provided';
    }
} else {
    $request['ipv6'] = 'Not provided';
    $request['ipv4'] = 'Not provided';
}

// If you want to include all GET parameters
//$request['get_params'] = $_GET;

// If you want to include all SERVER variables
//$request['server_vars'] = $_SERVER;

// Output the results
print_r($request);

// Call the Handler with the current domain
(new netcup\DNS\API\Handler($config, $request))->doRun();

