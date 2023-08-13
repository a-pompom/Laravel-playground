<?php

namespace Tests\Feature\Todo;

use App\Services\Todo\DeleteService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Todo\Task;

/**
 * Taskが削除されるか検証
 */
class DeleteServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 削除処理によってTaskが削除されること
     * @return void
     */
    public function testDelete(): void
    {
        // GIVEN
        Task::factory()->create(['name' => '終わったタスク', 'id' => 1]);
        $sut = new DeleteService();
        // WHEN
        $sut->delete(1);
        $actual = Task::count();
        // THEN
        $this->assertSame(0, $actual);
    }
}
