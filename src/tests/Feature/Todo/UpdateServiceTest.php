<?php

namespace Tests\Feature\Todo;

use App\Models\Todo\Task;
use App\Services\Todo\UpdateService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Todo\Constraint\TaskConstraint;
use Tests\TestCase;

/**
 * Taskの更新処理を検証
 */
class UpdateServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 更新処理を実行すると、対象のレコードのやることが書き換わること
     * @return void
     */
    public function testUpdate(): void
    {
        // GIVEN
        $expected = Task::factory()->make(['name' => '寝た']);
        $sut = new UpdateService();
        Task::factory()->create(['name' => '寝る', 'id' => 1]);

        // WHEN
        $sut->update(1, '寝た');
        $actual = Task::whereId(1)->first();

        // THEN
        $this->assertThat($actual, new TaskConstraint($expected));
    }
}
