<?php

namespace Tests\Feature\Todo;

use App\Models\Todo\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Todo\Constraint\TaskConstraint;
use Tests\TestCase;

/**
 * Todoリスト機能を検証
 */
class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 一覧画面が所定のView・コンテキスト名から描画されること
     * @return void
     */
    public function testList(): void
    {
        // GIVEN
        Task::factory()->create(['name' => '食べる']);

        // WHEN
        $response = $this->get(route('task.index'));

        // THEN
        $response->assertViewIs('todo.index');
        $response->assertViewHas('tasks');
    }

    /**
     * 作成処理へのリクエストからTaskがつくられること
     * @return void
     */
    public function testCreate(): void
    {
        // WHEN
        $response = $this->post(route('task.create'), ['name' => '歩く']);
        $task = Task::whereName('歩く')->first();

        // THEN
        $response->assertRedirect(route('task.index'));
        $this->assertSame('歩く', $task->name);
    }

    /**
     * 更新処理からTaskが更新されること
     * @return void
     */
    public function testUpdate(): void
    {
        // GIVEN
        $expected = Task::factory()->make(['name' => '歩いた']);

        // WHEN
        Task::factory()->create(['id' => 1, 'name' => '歩く']);
        $response = $this->post(route('task.update', ['id' => 1]), ['name' => '歩いた']);

        // THEN
        $response->assertRedirect(route('task.index'));
        $this->assertThat(Task::whereId(1)->first(), new TaskConstraint($expected));
    }

    /**
     * 削除処理からTaskが削除されること
     * @return void
     */
    public function testDelete(): void
    {
        // GIVEN
        Task::factory()->create(['id' => 1, 'name' => 'やり終えた']);

        // WHEN
        $response = $this->post(route('task.delete', ['id' => 1]));

        // THEN
        $response->assertRedirect(route('task.index'));
        $this->assertSame(0, Task::count());
    }
}
