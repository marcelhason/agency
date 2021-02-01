<?php

namespace App\Http\Requests;

use App\Models\Task;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_create');
    }

    public function rules()
    {
        return [
            'name'            => [
                'string',
                'required',
            ],
            'client_id'       => [
                'integer',
                'exists:clients,id',
                'nullable',
            ],
            'porject_type_id' => [
                'integer',
                'exists:project_types,id',
                'nullable',
            ],
            'start_date'      => [
                'date_format:' . config('project.datetime_format'),
                'nullable',
            ],
            'deadtime'        => [
                'date_format:' . config('project.datetime_format'),
                'nullable',
            ],
            'price'           => [
                'numeric',
                'nullable',
            ],
            'costs'           => [
                'numeric',
                'nullable',
            ],
            'status_id'       => [
                'integer',
                'exists:statuses,id',
                'nullable',
            ],
            'invoice'         => [
                'boolean',
            ],
            'paid'            => [
                'boolean',
            ],
            'description'     => [
                'string',
                'nullable',
            ],
            'assingned'       => [
                'array',
            ],
            'assingned.*.id'  => [
                'integer',
                'exists:users,id',
            ],
            'comments'        => [
                'array',
            ],
            'comments.*.id'   => [
                'integer',
                'exists:comments,id',
            ],
        ];
    }
}
