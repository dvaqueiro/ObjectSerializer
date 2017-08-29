<?php

namespace Dvaqueiro\ObjectSerializer;

use Symfony\Component\Serializer\NameConverter\NameConverterInterface;

/**
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class ArrayMapNameConverter implements NameConverterInterface
{
    private $arrayMapping;

    /**
     *
     * @param array[] $arrayMapping with 'property' => 'key'
     *
     * example: array('personName' => 'name', 'personAge' => 'person_age')
     */
    function __construct($arrayMapping)
    {
        $this->arrayMapping = is_array($arrayMapping) ? $arrayMapping : array();
    }

    public function denormalize($propertyName): string
    {
        $out = array_search($propertyName, $this->arrayMapping);
        return ($out == null) ? $propertyName : $out;
    }

    public function normalize($propertyName): string
    {
        $out = $propertyName;
        if (array_key_exists($propertyName, $this->arrayMapping)) {
            $out = $this->arrayMapping[$propertyName];
        }

        return $out;
    }
}