<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $course = $this->qrCode->course;

        return [
            'id' => $this->id,
            'recorded_on' => $this->created_at->toFormattedDateString(),
            'time' => $this->created_at->toTimeString(),
            'course' => [
                'id' => $course->id,
                'name' => $course->course_name,
                'code' => $course->course_code
            ],
            'lecturer' => [
                'id' => $course->lecturer->id,
                'name' => $course->lecturer->user->name,
            ],

        ];
    }
}
