<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTournamentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'time' => 'sometimes|required|date',
            'description' => 'sometimes|required|string',
            'venue_id' => 'sometimes|required|exists:venues,id',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:8048',
        ];
    }
}
