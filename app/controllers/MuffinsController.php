<?php

class MuffinsController extends BaseApiController
{

    public function index()
    {
        $per_page = Input::get('per_page', 25);
        /** @var \Illuminate\Pagination\Paginator $paginated */
        $paginated = Muffin::paginate($per_page);
        $data      = [
            'items' => $paginated->getItems(),
            'page'  => $paginated->getCurrentPage(),
            'per_page' => $paginated->getPerPage(),
            'total' => $paginated->getTotal()
        ];
        return $data;
    }

    public function show($muffin_id)
    {
        try {
            $target = Muffin::findOrFail($muffin_id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->respondNotFound();
        }

        return $target;
    }

    public function destroy($muffin_id) {
        try {
            /** @var Muffin $target */
            $target = Muffin::findOrFail($muffin_id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->respondNotFound();
        }

        $data = [
            'deleted' => $target->delete()
        ];
        return $data;
    }
}