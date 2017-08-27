<?php

namespace ObjectSerializer\Model\Serializer;

use Symfony\Component\Serializer\NameConverter\NameConverterInterface;

/**
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class ArrayMapNameConverter implements NameConverterInterface
{
    private $arrayMapping;
    private $internalCounter;

    /**
     *
     * @param array[] $arrayMapping with 'property' => 'key'
     *
     * example: array('personName' => 'name', 'personAge' => 'person_age')
     */
    function __construct($arrayMapping)
    {
        $this->arrayMapping = is_array($arrayMapping) ? $arrayMapping : array();
        foreach ($this->arrayMapping as $key => $value) {
            if (is_array($value)) {
                $this->internalCounter[$key] = 0;
            }
        }
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

        if (is_array($out)) {
            $out = $this->arrayMapping[$propertyName][$this->internalCounter[$propertyName]];
            $this->internalCounter[$propertyName] ++;
            if ($this->internalCounter[$propertyName] > (count($this->arrayMapping[$propertyName]) - 1)) {
                $this->internalCounter[$propertyName] = 0;
            }
        }

        return $out;
    }
}