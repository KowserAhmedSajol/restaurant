<?php

namespace restaurant\restaurant\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}