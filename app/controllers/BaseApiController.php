<?php

use Illuminate\Http\JsonResponse;

abstract class BaseApiController extends \Illuminate\Routing\Controller
{

    protected $per_page = 25;

    public function respondJson($data, $code, $headers = []){
        return new JsonResponse($data, $code, $headers);
    }

    public function respondNotFound()
    {
        return $this->respondJson(["message" => sprintf("URI %s not found.", Request::path())], 404);
    }

    public function respondOk($data)
    {
        return $this->respondJson($data, 200);
    }

    /**
     * @param $paginated
     * @return array
     */
    protected function buildPaginationResponse(\Illuminate\Pagination\Paginator $paginated)
    {
        $data = [
            'items'         => $paginated->getItems(),
            'page'          => $paginated->getCurrentPage(),
            'per_page'      => $paginated->getPerPage(),
            'page_results'  => $paginated->count(),
            'total_results' => $paginated->getTotal()
        ];
        return $data;
    }
}