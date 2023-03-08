<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\MembersManagement;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MembersManagementController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('members_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.members-management.index');
    }

    public function create()
    {
        abort_if(Gate::denies('members_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.members-management.create');
    }

    public function edit(MembersManagement $membersManagement)
    {
        abort_if(Gate::denies('members_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.members-management.edit', compact('membersManagement'));
    }

    public function show(MembersManagement $membersManagement)
    {
        abort_if(Gate::denies('members_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.members-management.show', compact('membersManagement'));
    }

    public function __construct()
    {
        $this->csvImportModel = MembersManagement::class;
    }
}
