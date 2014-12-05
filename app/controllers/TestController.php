<?php

class TestController extends BaseApiController
{

    public function hello()
    {
        return ['message' => 'Hello World!'];
    }

    public function itemsIndex()
    {
        return [
            'items' => ['foo']
        ];
    }
}