<?php

namespace App\Http\Requests\Exam;

use App\Support\Enums\IntentEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExamRequest extends FormRequest {
    public function rules(): array {
        $intent = $this->get('intent');
        switch ($intent) {
            // case IntentEnum::API_USER_IMPORT_EXAM->value:
            //     return [
            //         'user_id' => 'required|integer|exists:users,id',
            //         'name' => 'required|string|max:255',
            //         'exam_code' => 'required|string|max:255',
            //         'start_period' => 'required|datetime',
            //         'end_period' => 'required|datetime',
            //         'duration' => 'required|integer',
            //         'import_file' => 'required|mimes:xlsx,xls,csv',
            //     ];
            default:
                return [
                    'user_id' => 'sometimes|exists:users,id',
                    'task_id' => 'sometimes|exists:tasks,id',
                    'name' => 'sometimes|string|max:255',
                    'exam_code' => 'sometimes|string|max:255',
                    'start_period' => 'sometimes|date_format:Y-m-d H:i:s',
                    'end_period' => 'sometimes|date_format:Y-m-d H:i:s',
                    'duration' => 'sometimes|integer',
                    // 'import_file' => 'nullable|mimes:xlsx,xls,csv',
                    'supporting_file' => 'sometimes|file',
                ];
            }
    }
}
