<?php

namespace ObjectSerializer\Model\ResponseFormat;

/**
 * Description of XMLResponse
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class JsonResponse
{
    function __construct($data)
    {
        header('Content-Type: application/json');
        echo $data;
    }

}