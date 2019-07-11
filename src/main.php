<?php
include('buildKeywords.php');

$config = include('../config.php');

// URL to NewsApi
$url = $config['url'];

// API key (newsapi.org)
$key = $config['key'];

// Endpoints: top-headlines, everything, sources.

// For the needs of this application, endpoint 'everything' is used.
$endpoint = 'everything';

switch($endpoint) {
    case 'top-headlines':
        $url .= "top-headlines";
    break;

    case 'everything':
        $url .= "everything";
    break;

    case 'sources':
        $url .= "sources";
    break;

    default:
        // Default endpoint everything
        $url .= "everything";
    break;
}

// Get data from json file
$json_data = file_get_contents('pko_ekstraklasa.json');

// json to array
$ekstraklasa = json_decode($json_data, true);

$parameters_GET = [
    'q' => buildKeywords($ekstraklasa), // build keywords query
    'from' => date('Y-m-d', strtotime("-5 days", time())), //previous 5 days
    'to' => date('Y-m-d'), // today
    'sortBy' => 'publishedAt',
    'language' => 'pl',
    'pageSize' => 100, // max 100 news
    'apiKey' => $key
];

$http_query = http_build_query($parameters_GET);

$url .= '?' . $http_query;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$output = curl_exec($ch);

curl_close($ch);

$results = json_decode($output, true);

if ( $results['status'] === 'ok' ) {
    // Success
    print_r($results['articles']);
} else {
    // Error
    print_r($results);
}

?>