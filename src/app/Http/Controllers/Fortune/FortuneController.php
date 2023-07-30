<?php

namespace App\Http\Controllers\Fortune;

use App\Services\Fortune\FortuneService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

/**
 * おみくじ処理を制御することを責務に持つ
 */
class FortuneController extends BaseController
{
    /**
     * おみくじ画面を表示
     * @return View
     */
    public function index(): View
    {
        return view('fortune.index');
    }

    /**
     * おみくじ結果画面を表示
     * @param FortuneService $fortuneService
     * @return View
     */
    public function result(FortuneService $fortuneService): View
    {
        return view('fortune.result')->with('fortune', $fortuneService->makeFortune());
    }
}
