<?php

namespace Kletellier\Random\Tests;
 
class PackageTest extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    { 
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            'Kletellier\Random\RandomServiceProvider',
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Random' => 'Kletellier\Random\RandomFacade',
        ];
    }

    public function testBinding()
    {
        $random = $this->app->make('random');
        $this->assertInstanceOf(\RandomLib\Generator::class,$random);
    }

    public function testGeneratesRandomFacade()
    { 
        $int = \Random::generateInt(0,100);
        $this->assertIsNumeric($int);
        $this->assertGreaterThanOrEqual(0,$int);
        $this->assertLessThanOrEqual(100,$int);
    }

    public function testGenerateRandomTextFacade()
    {
        $length = 8;
        $str = \Random::generateString($length);
        $this->assertEquals($length,strlen($str));
        $this->assertIsString($str);
    }

    public function testConfiguration()
    { 
        $this->app['config']->set('random.strength', "high");
        $int = \Random::generateInt(0,100);
        $this->assertIsNumeric($int);
        $this->assertGreaterThanOrEqual(0,$int);
        $this->assertLessThanOrEqual(100,$int);
        $this->app['config']->set('random.strength', "low");
        $int = \Random::generateInt(0,100);
        $this->assertIsNumeric($int);
        $this->assertGreaterThanOrEqual(0,$int);
        $this->assertLessThanOrEqual(100,$int);
    }
}