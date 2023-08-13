<?php

namespace App\Services\Todo;

use App\Models\Todo\Task;

/**
 * Taskの更新処理を責務に持つ
 */
class UpdateService
{

    /**
     * Taskを更新
     *
     * @param int $id 対象の識別子
     * @param string $name 更新後のやること
     * @return void
     */
    public function update(int $id, string $name): void
    {
        $task = Task::whereId($id);
        $task->update(['name' => $name]);
    }
}
