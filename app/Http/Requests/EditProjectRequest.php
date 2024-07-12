<?php

namespace App\Http\Requests;

use App\Rules\SupervisorRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EditProjectRequest extends FormRequest
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
        $user = Auth::user()->id;

        // dd($this->project_id);
        
        return [
            'title' => [
                'required',
                Rule::unique('projects')->where(function ($query) use ($user) {
                    return $query->where('user_id', $user)->where('id', '!=', $this->project_id);
                }),
            ],
            'description'   => 'required',
            'supervisor'    => ['required', 'exists:users,id', new SupervisorRule() ],
            'project_file'  => ['file'],
            'snapshots'     => ['array'],
            'snapshots.*'   => 'image'
        ];
    }
}
