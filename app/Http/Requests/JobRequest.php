<?php

namespace App\Http\Requests;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:5|max:255',
            'description' => 'required|string|min:5|max:5000',
            'salary' => 'required|numeric|min:1|max:1000000',
            'location' => 'required|string|min:3|max:255',
            'category' => 'required|in:' . implode(',',Job::$categories),
            'experience' => 'required|in:' . implode(',',Job::$experience),
        ];
    }
}
