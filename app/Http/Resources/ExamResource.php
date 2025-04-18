<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource {
    public function toArray($request): array {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'exam_code' => $this->exam_code,
            'task_id' => $this->task_id,
            'start_period' => $this->start_period,
            'end_period' => $this->end_period,
            'duration'=> $this->duration,
            'filename' => $this->filename,
            'supporting_file' => $this->supporting_file,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
