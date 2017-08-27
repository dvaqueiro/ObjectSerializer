<?php

namespace ObjectSerializer\Model\ResponseFormat;

/**
 * Description of XMLResponse
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class XMLResponse
{
    function __construct($data)
    {
        header("Content-type: text/xml; charset=utf-8");
        echo $data;
    }

}