<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title'=>'required|unique:posts',
            'fname'=>'required',
            'lname'=>'required',
            'description'=>'required',
            'content'=>'required',
            'city_name'=>'required',
            'amphur'=>'required',
            'district'=>'required',
            'postcode'=>'required',
            'tel'=>'required',
            // 'category_s'=>'required',
            'category'=>'required',
            'lat'=>'required',
            'long'=>'required',
            'image'=>'required|image',
            'image1'=>'required|image'
            
        ];
    }
}
