<?php

namespace Tests\Unit\Fortune;

use App\Services\Fortune\FortuneService;
use PHPUnit\Framework\TestCase;

/**
 * 運勢を生成する処理を検証
 */
class FortuneTest extends TestCase
{
    /**
     * 運勢が候補のいずれかから生成されること
     * @return void
     */
    public function testMakeFortune(): void
    {
        $sut = new FortuneService();

        $actual = $sut->makeFortune();

        $this->assertContains($actual, FortuneService::CANDIDATES);
    }
}
