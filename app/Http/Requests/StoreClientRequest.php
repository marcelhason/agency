<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_create');
    }

    public function rules()
    {
        return [
            'company_name' => [
                'string',
                'nullable',
            ],
            'email'        => [
                'nullable',
            ],
            'phone'        => [
                'string',
                'nullable',
            ],
        ];
    }
}
