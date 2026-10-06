<?php

namespace App\Http\Requests;

use App\Enums\ContentType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostMediaContentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'media_type' => ['required', Rule::enum(ContentType::class)],
            'content' => ['required', 'string'],
            'title' => ['required', 'string'],
            'min_completion_time' => ['required', 'integer'],
            'course_id' => ['required', 'string', Rule::exists('courses', 'id')],
            'meta_data' => ['nullable', 'string']
        ];
    }
}
