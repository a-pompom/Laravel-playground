<?php

namespace Tests\Feature\Todo;

use App\Models\Todo\Task;
use App\Services\Todo\ReadService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * 画面へ表示するTask読み出し処理を検証
 */
class ReadServiceTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * 画面の表示対象として全件を読み出していること
     * @return void
     */
    public function testReadAll(): void
    {
        // GIVEN
        $expected = 3;
        Task::factory()->count($expected)->create();
        $sut = new ReadService();

        // WHEN
        $actual = $sut->read();

        // THEN
        $this->assertSame($actual->count(), $expected);
    }

    /**
     * 取得結果はID昇順で並べ替えられていること
     * @return void
     */
    public function testOrder(): void
    {
        // GIVEN
        $expected = [1, 2, 3, 4, 5];
        Task::factory()->count(5)->create();
        $sut = new ReadService();

        // WHEN
        $records = $sut->read();
        $actual = $records->pluck('id')->toArray();

        // THEN
        $this->assertSame($actual, $expected);
    }
}
