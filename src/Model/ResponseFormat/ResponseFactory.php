<?php

namespace ObjectSerializer\Model\ResponseFormat;

/**
 * Description of ResponseFactory
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class ResponseFactory
{
    static function make($type, $data)
    {
        switch ($type) {
            case 'json':
                $out = new JsonResponse($data);
                break;
            case 'xml':
                $out = new XmlResponse($data);
                break;
            case 'csv':
                $out = new CsvResponse($data);
                break;
        }
    }
}