<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
          'combany_name'=>'required|max:50',
          'responsible_name'=>'required|max:50',
          'email'=>'required|email|unique:users,email,'.$id,
          'mob_num'=>'required|digits:10',
          'sections_id'=>'required',


        ];
    }
}
