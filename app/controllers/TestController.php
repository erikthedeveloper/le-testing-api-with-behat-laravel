<?php

class TestController extends BaseApiController
{

    public function hello()
    {
        return $this->respondOk(['message' => 'Hello World!']);
    }

    public function requireAuth()
    {
        return $this->respondOk(["message" => "Welp, you must be auth'ed then!"]);
    }

    public function itemsIndex()
    {
        $total     = 125;
        $items     = range(1, $total);
        $paginated = Paginator::make($items, $total, $this->per_page);
        $data      = $this->buildPaginationResponse($paginated);
        return $this->respondOk($data);
    }
}