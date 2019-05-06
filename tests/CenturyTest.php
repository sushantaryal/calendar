<?php

namespace Taggers\Century\Tests;

use PHPUnit\Framework\TestCase;
use Taggers\Century\Model\Century;
use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class CenturyTest extends TestCase
{
    public function setUp()
    {
        Eloquent::unguard();

        $db = new DB;
        $db->addConnection([
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);
        $db->bootEloquent();
        $db->setAsGlobal();

        $this->schema()->create('century_calendar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('all_day')->default(0);
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->json('options')->nullable();
            $table->timestamps();
        });
    }

    public function tearDown()
    {
        $this->schema()->drop('century_calendar');
    }

    public function testEventCanBeCreated()
    {
        $event = $this->createEvent();

        $this->assertEquals(1, count($event));
        $this->assertEquals('Example', $event->title);
    }

    public function testEventCanBeUpdated()
    {
        $event = $this->createEvent();

        $event->title = 'Example 2';
        $event->save();

        $this->assertNotEquals('Example', $event->title);
        $this->assertEquals('Example 2', $event->title);
    }

    public function testEventCanBeDeleted()
    {
        $event = $this->createEvent();

        $event->delete();

        $this->assertEquals(0, Century::all()->count());
    }

    protected function schema(): Builder
    {
        return $this->connection()->getSchemaBuilder();
    }
    
    protected function connection(): ConnectionInterface
    {
        return Eloquent::getConnectionResolver()->connection();
    }

    protected function createEvent()
    {
        return Century::create([
            'title' => 'Example',
            'all_day' => 0,
            'start' => '2019-04-26 12:23',
            'end' => '2019-04-27 12:23',
            'options' => [
                'url' => 'https://google.com'
            ]
        ]);
    }
}