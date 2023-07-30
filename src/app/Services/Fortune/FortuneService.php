<?php

namespace App\Services\Fortune;

/**
 * 運勢を生成することを責務に持つ
 */
class FortuneService
{
    const CANDIDATES = ['小吉', '中吉', '大吉'];

    /**
     * 運勢を生成
     * @return string 今日の運勢を表す文字列
     */
    public function makeFortune(): string
    {
        return self::CANDIDATES[rand(0, 2)];
    }
}
