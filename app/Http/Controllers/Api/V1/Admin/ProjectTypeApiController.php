<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectTypeRequest;
use App\Http\Requests\UpdateProjectTypeRequest;
use App\Http\Resources\Admin\ProjectTypeResource;
use App\Models\ProjectType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectTypeResource(ProjectType::advancedFilter());
    }

    public function store(StoreProjectTypeRequest $request)
    {
        $projectType = ProjectType::create($request->validated());

        return (new ProjectTypeResource($projectType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(ProjectType $projectType)
    {
        abort_if(Gate::denies('project_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(ProjectType $projectType)
    {
        abort_if(Gate::denies('project_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectTypeResource($projectType);
    }

    public function update(UpdateProjectTypeRequest $request, ProjectType $projectType)
    {
        $projectType->update($request->validated());

        return (new ProjectTypeResource($projectType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(ProjectType $projectType)
    {
        abort_if(Gate::denies('project_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ProjectTypeResource($projectType),
            'meta' => [],
        ]);
    }

    public function destroy(ProjectType $projectType)
    {
        abort_if(Gate::denies('project_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
