<?php

namespace App\Http\Requests;

use App\Enums\UserLevel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'course_type' => ['required', 'string', 'max:25'],
            'short_description' => ['required', 'string'],
            'user_level' => ['required', Rule::enum(UserLevel::class)],
            'thumbnail_url' => ['required', 'url:https'],
            'learning_outcome' => ['required', 'string'],
            'created_by' => ['required', 'string', 'max:100'],
            'org_id' => ['required', 'string']
        ];
    }
}
