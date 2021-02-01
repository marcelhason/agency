<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\ChartsService;

class DashboardApiController extends Controller
{
    public function index()
    {
        $latest0 = new ChartsService([
            'title'            => 'lalal',
            'chart_type'       => 'latest',
            'model'            => 'App\Models\Project',
            'column_class'     => 'col-md-6',
            'fields'           => ['name'],
            'limit'            => 5,
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 7,
        ]);

        return response()->json(compact('latest0'));
    }
}
