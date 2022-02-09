<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class TodoRequest extends FormRequest
{
    public function rules(): array
    {
        $action = Route::currentRouteName();

        return [
            'title'       => $action === 'todolist.create' ? 'required|string|max:255' : 'string|max:255',
            'description' => 'string',
            'completed'   => 'boolean',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
