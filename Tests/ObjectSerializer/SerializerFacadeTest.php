<?php

namespace Dvaqueiro\ObjectSerializer\Tests;

use Dvaqueiro\ObjectSerializer\SerializerFacade;
use Dvaqueiro\ObjectSerializer\SerializerFacadeInterface;
use PHPUnit\Framework\TestCase;

/**
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class SerializerFacadeTest extends TestCase
{

    public function testConstruction()
    {
        $serializer = new SerializerFacade('someClass', null);
        $this->assertInstanceOf(SerializerFacadeInterface::class, $serializer);
    }

    public function testSerializeFromInvalidFormat()
    {
        $this->expectException(\Dvaqueiro\ObjectSerializer\NotAllowedFormatException::class);
        $serializer = new SerializerFacade('someClass', null);
        $serializer->serialize(new \stdClass(), 'invalidFormat');
    }

    public function testSerialize()
    {
        $serializer = new SerializerFacade(\stdClass::class, null);
        $out = $serializer->serialize(new \stdClass(), 'json');
        $this->assertEquals('[]', $out);
    }

}