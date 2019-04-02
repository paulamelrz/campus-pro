<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChannelCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'channel_name'=>['required', "regex:^[a-zA-Z0-9$&+,:;=?@#|'<>.^*()%!-
]{2,255}$^"],
            'description'=>["regex:^[a-zA-Z0-9$&+,:;=?@#|'<>.^*()%!-]{2,255}$^"]
        ];
    }
}
