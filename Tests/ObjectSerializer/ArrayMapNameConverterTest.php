<?php

namespace Dvaqueiro\ObjectSerializer\Tests;

use Dvaqueiro\ObjectSerializer\ArrayMapNameConverter;
use PHPUnit\Framework\TestCase;

/**
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class ArrayMapNameConverterTest extends TestCase
{

    public function testConstruction()
    {
        $nameMapper = new ArrayMapNameConverter(array());
        $this->assertInstanceOf(ArrayMapNameConverter::class, $nameMapper);
    }

    public function testInterface()
    {
        $nameMapper = new ArrayMapNameConverter(array());
        $this->assertInstanceOf('Symfony\Component\Serializer\NameConverter\NameConverterInterface', $nameMapper);
    }

    public function testConstructionWithoutArray()
    {
        $nameMapper = new ArrayMapNameConverter('not a array');
        $this->assertInstanceOf(ArrayMapNameConverter::class, $nameMapper);
    }

    public function testNormalizer()
    {
        $nameMapper = new ArrayMapNameConverter(array(
            'propertyFirst' => 'property_first',
            'propertySecond' => 'second',
        ));

        $keys[] = $nameMapper->normalize('propertyFirst');
        $keys[] = $nameMapper->normalize('propertySecond');
        $keys[] = $nameMapper->normalize('propertyThird');

        $this->assertEquals(array('property_first', 'second', 'propertyThird'), $keys);
    }

    public function testDenormalizer()
    {
        $nameMapper = new ArrayMapNameConverter(array(
            'propertyFirst' => 'property_first',
            'propertySecond' => 'second',
        ));

        $keys[] = $nameMapper->denormalize('property_first');
        $keys[] = $nameMapper->denormalize('second');
        $keys[] = $nameMapper->denormalize('third');

        $this->assertEquals(array('propertyFirst', 'propertySecond', 'third'), $keys);
    }
}