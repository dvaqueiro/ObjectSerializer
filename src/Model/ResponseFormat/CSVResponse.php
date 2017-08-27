<?php

namespace ObjectSerializer\Model\ResponseFormat;

/**
 * Description of XMLResponse
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class CSVResponse
{
    function __construct($data)
    {
        header('Content-Type: text/plain;charset=UTF-8');
        echo $data;
    }

}