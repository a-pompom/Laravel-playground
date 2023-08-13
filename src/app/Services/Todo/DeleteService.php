<?php

namespace App\Services\Todo;

use App\Models\Todo\Task;

/**
 * Taskの削除処理を責務に持つ
 */
class DeleteService
{

    /**
     * 対象のTaskを削除
     *
     * @param int $id 削除対象
     * @return void
     */
    public function delete(int $id): void
    {
        Task::whereId($id)->first()->delete();
    }
}
