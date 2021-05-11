<?php

namespace Morsapt\Changelog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangelogStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "changelog" => "required",
            "is_active" => "nullable",
            "is_public" => "nullable"
        ];
    }

    public function prepareForValidation()
    {
        $this->changelog = str_replace("\n", "\r\n", $this->changelog);
        // dd($this->changelog);
    }
}
