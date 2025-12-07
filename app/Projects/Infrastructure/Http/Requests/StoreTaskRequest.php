<?php

namespace App\Projects\Infrastructure\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class StoreTaskRequest extends FormRequest
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
        Log::info('StoreTaskRequest rules method called', $this->all());
        return [
            'project_id'    => 'required|exists:projects,id',
            'title'         => 'required|string|max:255',
            'deadline'      => 'required|date',
            'assigned_user' => 'required|integer|exists:users,id',
            'status'        => 'required|string',
        ];
    }
}