<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMembersManagementRequest;
use App\Http\Requests\UpdateMembersManagementRequest;
use App\Http\Resources\Admin\MembersManagementResource;
use App\Models\MembersManagement;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MembersManagementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('members_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MembersManagementResource(MembersManagement::with(['owner'])->get());
    }

    public function store(StoreMembersManagementRequest $request)
    {
        $membersManagement = MembersManagement::create($request->validated());

        return (new MembersManagementResource($membersManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MembersManagement $membersManagement)
    {
        abort_if(Gate::denies('members_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MembersManagementResource($membersManagement->load(['owner']));
    }

    public function update(UpdateMembersManagementRequest $request, MembersManagement $membersManagement)
    {
        $membersManagement->update($request->validated());

        return (new MembersManagementResource($membersManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MembersManagement $membersManagement)
    {
        abort_if(Gate::denies('members_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membersManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
