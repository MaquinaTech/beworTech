<?php

namespace Vocces\Shared\ValueObject;

use Tests\TestCase;
use Vocces\Shared\ValueObject\Uuid;

final class UuidTest extends TestCase
{
    /**
     * @group value-object
     * @group shared
     * @test
     */
    public function invalidUuid()
    {
        /**
         * Actions
         */
        $this->expectException(\Exception::class);
        new Uuid('😒');
    }


    /**
     * @group value-object
     * @group shared
     * @test
     */
    public function generateAndconvertToStringUuid()
    {
        /**
         * Actions
         */
        $testUuid = Uuid::generate();

        $uuid = new Uuid((string) $testUuid);

        /**
         * Assert
         */
        $this->assertEquals($uuid->get(), $testUuid->get());
    }
}
