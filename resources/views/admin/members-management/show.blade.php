@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.membersManagement.title_singular') }}:
                    {{ trans('cruds.membersManagement.fields.id') }}
                    {{ $membersManagement->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.membersManagement.fields.id') }}
                            </th>
                            <td>
                                {{ $membersManagement->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membersManagement.fields.hajji_no') }}
                            </th>
                            <td>
                                {{ $membersManagement->hajji_no }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membersManagement.fields.national_id_card_no') }}
                            </th>
                            <td>
                                {{ $membersManagement->national_id_card_no }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membersManagement.fields.full_name') }}
                            </th>
                            <td>
                                {{ $membersManagement->full_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membersManagement.fields.phone_number') }}
                            </th>
                            <td>
                                {{ $membersManagement->phone_number }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('members_management_edit')
                    <a href="{{ route('admin.members-managements.edit', $membersManagement) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.members-managements.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection