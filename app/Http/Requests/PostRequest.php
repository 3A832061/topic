<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
    public function messages()
    {
        return [
            'title.required' => '標題是必填',
            'title.max:255' => '標題字數過多',
            'content.required' => '內容是必填',
        ];
    }

    public function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'content' => ['required']
        ];
    }
}
