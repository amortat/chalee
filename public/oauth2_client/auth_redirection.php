<?php
$query = http_build_query(array(
    'client_id' => '6',
    'redirect_uri' => 'http://localhost/chalee/public/oauth2_client/callback.php',
    'response_type' => 'code',
    'scope' => '',
));

header('Location: http://localhost/chalee/public/oauth/authorize?'.$query);