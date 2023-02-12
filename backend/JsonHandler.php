<?php

/**
 * @param $response
 */
function response($response): void
{
    header('Content-Type: application/json');
    echo json_encode($response);
};