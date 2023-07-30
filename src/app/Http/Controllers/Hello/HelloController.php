<?php

namespace App\Http\Controllers\Hello;

use Illuminate\Routing\Controller as BaseController;

/**
 * Hello World処理を制御することを責務に持つ
 */
class HelloController extends BaseController
{
    /**
     * Hello World
     * @return string
     */
    public function hello(): string
    {
        return 'Hello World';
    }
}
