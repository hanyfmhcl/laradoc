@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.trip.title_singular') }}:
                    {{ trans('cruds.trip.fields.id') }}
                    {{ $trip->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.trip.fields.id') }}
                            </th>
                            <td>
                                {{ $trip->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.trip.fields.trip_type') }}
                            </th>
                            <td>
                                {{ $trip->trip_type }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('trip_edit')
                    <a href="{{ route('admin.trips.edit', $trip) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.trips.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection