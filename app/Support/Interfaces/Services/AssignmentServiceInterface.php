<?php

namespace App\Support\Interfaces\Services;
use App\Models\Assignment;
use Illuminate\Database\Eloquent\Model;
use Adobrovolsky97\LaravelRepositoryServicePattern\Services\Contracts\BaseCrudServiceInterface;

interface AssignmentServiceInterface extends BaseCrudServiceInterface {
    // public function create(array $data): ?Model;

    public function joinAssignment(array $data): ?Model;

    public function getAssignmentsByUserId($userId);

    public function downloadFile(Assignment $assignment);
}
