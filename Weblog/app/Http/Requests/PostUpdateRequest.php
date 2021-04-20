<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
        'title' => 'required',
        'body' => 'required',
        'slug' => 'required',
        'user_id' => 'required',
        'image_update' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'categories' => 'required|min:1',
        'is_premium' => 'sometimes|required',
      ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
          'title.required' => 'A title is required',
          'body.required' => 'A message is required',
          'slug.required' => 'A slug is required',
          'image_update.required' => 'Image must be jpeg, jpg or png.',
          'categories.required' => 'atleast one category required',
        ];
    }

}
