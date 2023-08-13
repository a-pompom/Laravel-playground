<?php

namespace Tests\Feature\Todo;

use App\Models\Todo\Task;
use App\Services\Todo\CreateService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Todo\Constraint\TaskConstraint;
use Tests\TestCase;

/**
 * レコード生成処理を検証
 */
class CreateServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * nameカラムが入力と対応したレコードが登録されること
     * @return void
     */
    public function testCreate(): void
    {
        // GIVEN
        $expected = Task::factory()->make(['name' => '寝る']);
        $sut = new CreateService();
        // WHEN
        $sut->create('寝る');
        $actual = Task::whereName('寝る')->first();
        // THEN
        $this->assertThat($actual, new TaskConstraint($expected));
    }
}
