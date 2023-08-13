<?php

namespace App\Services\Todo;

use App\Models\Todo\Task;

/**
 * Taskの登録を責務に持つ
 */
class CreateService
{
    /**
     * TaskをDBへ登録
     *
     * @param string $name やること
     * @return void
     */
    public function create(string $name): void
    {
        $task = new Task(['name' => $name]);
        $task->save();
    }
}
