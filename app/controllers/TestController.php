<?php

class TestController extends BaseApiController
{

    protected $per_page = 25;

    public function hello()
    {
        return ['message' => 'Hello World!'];
    }

    public function itemsIndex()
    {
        $total     = 125;
        $items     = range(1, $total);
        $paginated = Paginator::make($items, $total, $this->per_page);
        $data      = [
            'items' => $paginated->getItems(),
            'page'  => $paginated->getCurrentPage(),
            'total' => $paginated->getTotal()
        ];
        return $data;
    }
}