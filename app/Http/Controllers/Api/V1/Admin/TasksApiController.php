<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\Admin\TaskResource;
use App\Models\Client;
use App\Models\Comment;
use App\Models\ProjectType;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TasksApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaskResource(Task::with(['client', 'porjectType', 'status', 'assingned'])->advancedFilter());
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        $task->assingned()->sync($request->input('assingned.*.id', []));
        $task->comments()->sync($request->input('comments.*.id', []));

        return (new TaskResource($task))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Task $task)
    {
        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'client'       => Client::get(['id', 'company_name']),
                'porject_type' => ProjectType::get(['id', 'name']),
                'status'       => Status::get(['id', 'name']),
                'assingned'    => User::get(['id', 'name']),
                'comments'     => Comment::get(['id', 'description']),
            ],
        ]);
    }

    public function show(Task $task)
    {
        abort_if(Gate::denies('task_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaskResource($task->load(['client', 'porjectType', 'status', 'assingned', 'comments']));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        $task->assingned()->sync($request->input('assingned.*.id', []));
        $task->comments()->sync($request->input('comments.*.id', []));

        return (new TaskResource($task))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Task $task)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new TaskResource($task->load(['client', 'porjectType', 'status', 'assingned', 'comments'])),
            'meta' => [
                'client'       => Client::get(['id', 'company_name']),
                'porject_type' => ProjectType::get(['id', 'name']),
                'status'       => Status::get(['id', 'name']),
                'assingned'    => User::get(['id', 'name']),
                'comments'     => Comment::get(['id', 'description']),
            ],
        ]);
    }

    public function destroy(Task $task)
    {
        abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
