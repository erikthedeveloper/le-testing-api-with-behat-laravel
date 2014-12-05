<?php

abstract class BaseApiController extends \Illuminate\Routing\Controller {

    public function respondNotFound() {
        return Response::json(['message' => "URI " . Request::path() . " not found."], 404);
    }

}