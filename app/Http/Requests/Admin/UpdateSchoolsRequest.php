<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolsRequest extends FormRequest
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
            
            'school' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'price' => 'max:2147483647|nullable|numeric',
            'academic' => 'max:2147483647|nullable|numeric',
            'sports' => 'max:2147483647|nullable|numeric',
            'culture' => 'max:2147483647|nullable|numeric',
            'level' => 'required',
        ];
    }
}
