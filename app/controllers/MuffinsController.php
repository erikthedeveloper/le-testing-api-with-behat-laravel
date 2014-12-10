<?php

class MuffinsController extends BaseApiController
{

    public function index()
    {
        $per_page = Input::get('per_page', $this->per_page);
        $paginated = Muffin::paginate($per_page);
        $data = $this->buildPaginationResponse($paginated);

        return $this->respondOk($data);
    }

    public function show($muffin_id)
    {
        try {
            $target = Muffin::findOrFail($muffin_id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->respondNotFound();
        }

        return $this->respondOk($target);
    }

    public function destroy($muffin_id)
    {
        try {
            /** @var Muffin $target */
            $target = Muffin::findOrFail($muffin_id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->respondNotFound();
        }

        $data = [
            'deleted' => $target->delete()
        ];
        return $this->respondOk($data);
    }
}