<?php

namespace App\Support\Interfaces\Services;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Model;
use Adobrovolsky97\LaravelRepositoryServicePattern\Services\Contracts\BaseCrudServiceInterface;

interface ExamServiceInterface extends BaseCrudServiceInterface {
    public function joinExam(array $data): ?Model;

    public function downloadFile(Exam $exam);

    public function getExamsByUserId($userId);

    public function getExamsByUserRole($user);

    public function downloadSupport(Exam $exam);
}
