<?php

namespace Admin\Requests\Post;

use Admin\Requests\Request as AdminRequest;

class StorePostRequest extends AdminRequest
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
            'name' => [
                'required',
                'max:127',
            ],
            'content' => [
                'required',
            ],
            'meta_title' => 'nullable|max:512',
            'meta_keyword' => 'nullable|max:512',
            'meta_description' => 'nullable|max:512',
            'image' => [
                'image',
                'required',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048'
            ]
        ];
    }

    /**
     * Set validation attribute name.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Tên bài viết'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên bài viết không được để trống',
            'max' => 'Không được vượt quá :max kí tự ',
            'required' => 'không được để trống'
        ];
    }
}
