<?php

class InfoApiTest extends TestCase
{
    /**
     * スルーテスト（正常系）
     */
    public function testThroughCorrect()
    {
        $response = $this->call('GET', '/api/info?id=com.android.chrome&hl=ja');

        $this->assertEquals(200, $response->getStatusCode());

        $obj = $response->getData();

        // テスト前に下記のURLで最新の状態を確認する
        // https://play.google.com/store/apps/details?id=com.android.chrome&hl=ja
        $this->assertEquals("1", $obj->count);
        $this->assertEquals("Chromeブラウザ-Google", $obj->app_name);
        $this->assertContains("パソコンだけでなくAndroid搭載携帯電話やタブレットでも", $obj->description);
        $this->assertContains("バクの修正", $obj->release_note);
        $this->assertEquals("端末により異なります", $obj->version);
        $this->assertEquals("4.2", $obj->score);
    }

    /**
     * スルーテスト（正常系,言語未指定）
     */
    public function testThroughNoneLang()
    {
        $response = $this->call('GET', '/api/info?id=com.android.chrome');

        $this->assertEquals(200, $response->getStatusCode());

        $obj = $response->getData();

        // テスト前に下記のURLで最新の状態を確認する
        // https://play.google.com/store/apps/details?id=com.android.chrome&hl=ja
        $this->assertEquals("1", $obj->count);
        $this->assertEquals("Chromeブラウザ-Google", $obj->app_name);
        $this->assertContains("パソコンだけでなくAndroid搭載携帯電話やタブレットでも", $obj->description);
        $this->assertContains("バクの修正", $obj->release_note);
        $this->assertEquals("端末により異なります", $obj->version);
        $this->assertEquals("4.2", $obj->score);
    }

    /**
     * スルーテスト（ID未指定）
     */
    public function testThroughNoneId()
    {
        $response = $this->call('GET', '/api/info?id=&hl=ja');

        $this->assertEquals(200, $response->getStatusCode());

        $obj = $response->getData();

        $this->assertEquals("0", $obj->count);
    }

    /**
     * スルーテスト（存在しないID）
     */
    public function testThroughNotExistId()
    {
        $response = $this->call('GET', '/api/info?id=test&hl=ja');

        $this->assertEquals(200, $response->getStatusCode());

        $obj = $response->getData();

        $this->assertEquals("0", $obj->count);
    }
}
