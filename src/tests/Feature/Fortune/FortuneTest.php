<?php

namespace Tests\Feature\Fortune;

use App\Services\Fortune\FortuneService;
use Mockery\MockInterface;
use Tests\TestCase;

class FortuneTest extends TestCase
{
    /**
     * おみくじトップ画面が表示できること
     * @return void
     */
    public function testIndex(): void
    {
        $response = $this->get(route('fortune.index'));

        $response->assertStatus(200);
        $response->assertViewIs('fortune.index');
    }

    /**
     * 結果画面をおみくじの結果をコンテキストに表示できること
     * @return void
     */
    public function testResult(): void
    {
        // ランダム要素を除くためにモックで置き換え
        $mock = \Mockery::mock(FortuneService::class);
        $mock->shouldReceive('makeFortune')->andReturn('大吉');
        $this->instance(FortuneService::class, $mock);

        $response = $this->get(route('fortune.result'));

        $response->assertStatus(200);
        $response->assertViewIs('fortune.result');
        $response->assertViewHas('fortune', '大吉');
    }
}
