<?php

namespace App\Http\Controllers\Api;

use App\Models\Sistem;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\InformasiUmum;
use App\Models\AssignmentUser;
use App\Http\Resources\InformasiUmumResource;
use App\Http\Requests\InformasiUmum\StoreInformasiUmumRequest;
use App\Http\Requests\InformasiUmum\UpdateInformasiUmumRequest;
use App\Support\Interfaces\Services\InformasiUmumServiceInterface;

class ApiInformasiUmumController extends ApiController {
    public function __construct(
        protected InformasiUmumServiceInterface $informasiUmumService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $perPage = request()->get('perPage', 5);

        return InformasiUmumResource::collection($this->informasiUmumService->getAllPaginated($request->query(), $perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInformasiUmumRequest $request) {
        return $this->informasiUmumService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Assignment $assignment, Sistem $sistem, InformasiUmum $informasiUmum, Request $request) {

        $informasiUmum = $this->informasiUmumService->getInformasiUmumDetail(
            $assignment,
            $sistem,
            $informasiUmum,
            $request
        );

        return new InformasiUmumResource($informasiUmum);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Assignment $assignment, Sistem $sistem, UpdateInformasiUmumRequest $request, InformasiUmum $informasiUmum) {

        $informasiUmum = $this->informasiUmumService->updateInformasiUmum(
            $assignment,
            $sistem,
            $informasiUmum,
            $request->validated()
        );

        return new InformasiUmumResource($informasiUmum);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, InformasiUmum $informasiUmum) {
        return $this->informasiUmumService->delete($informasiUmum);
    }
}
