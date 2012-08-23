<?php
App::import('vendor','instaphp');
//-- Get an instance of the Instaphp object
$api = Instaphp\Instaphp::Instance();

//-- Get the response for Popular media
$response = $api->Media->Popular();

//-- Check if an error was returned from the API
if (empty($response->error))
    foreach ($response->data as $item)
        printf('<img src="%s" width="%d" height="%d" alt="%s">', $item->images->thumbnail->url, $item->images->thumbnail->width, $item->images->thumbnail->height, empty($item->caption->text) ? 'Untitled':$item->caption->text);
 ?> 