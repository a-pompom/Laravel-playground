<?php

namespace Tests\Feature\Hello;

use Tests\TestCase;

/**
 * Hello Worldコントローラがレスポンスを返せるか検証
 */
class HelloTest extends TestCase
{

    /**
     * パスと処理が紐づいており、ステータスコード正常が得られること
     * @return void
     */
    public function testRequestSuccess(): void
    {
        $response = $this->get('/hello/');
        $response->assertStatus(200);
    }
}
