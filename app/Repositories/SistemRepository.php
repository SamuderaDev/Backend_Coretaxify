<?php

namespace App\Repositories;

use Adobrovolsky97\LaravelRepositoryServicePattern\Repositories\BaseRepository;
use App\Models\Sistem;
use App\Support\Interfaces\Repositories\SistemRepositoryInterface;
use App\Traits\Repositories\HandlesFiltering;
use App\Traits\Repositories\HandlesRelations;
use App\Traits\Repositories\HandlesSorting;
use Illuminate\Database\Eloquent\Builder;
use App\Support\Enums\IntentEnum;

class SistemRepository extends BaseRepository implements SistemRepositoryInterface {
    use HandlesFiltering, HandlesRelations, HandlesSorting;

    protected function getModelClass(): string {
        return Sistem::class;
    }

    protected function applyFilters(array $searchParams = []): Builder {
        $query = $this->getQuery();

        if (isset($searchParams['tipe_akun']) && is_array($searchParams['tipe_akun'])) {
            $query->whereIn('tipe_akun', $searchParams['tipe_akun']);
        }

        $query = $this->applySearchFilters($query, $searchParams, ['name'], []);

        $query = $this->applyColumnFilters($query, $searchParams, ['id']);

        $query = $this->applyResolvedRelations($query, $searchParams);

        $query = $this->applySorting($query, $searchParams);

        return $query;
    }
}