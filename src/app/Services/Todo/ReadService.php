<?php

namespace App\Services\Todo;

use App\Models\Todo\Task;
use Illuminate\Support\Collection;

/**
 * Taskの読み出しを責務に持つ
 */
class ReadService
{

    /**
     * 画面に表示するTaskを読み出す
     *
     * @return Collection
     */
    public function read(): Collection
    {
        return Task::orderBy('id')->get();
    }
}
