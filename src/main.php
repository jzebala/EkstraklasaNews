<?php
$config = include('../config.php');

// URL to NewsApi
$url = $config['url'];

// API key (newsapi.org)
$key = $confg['key'];

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

$parameters_GET = [
    'q' => build_query($pko_ekstraklasa_teams),
    'from' => date('Y-m-d', strtotime("-5 days", time())), //previous 5 days
    'to' => date('Y-m-d'), // today
    'sortBy' => 'publishedAt',
    'language' => 'pl',
    'pageSize' => 100, // max 100 news
    'apiKey' => $key
];
?>