@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.doc.title_singular') }}:
                    {{ trans('cruds.doc.fields.id') }}
                    {{ $doc->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.doc.fields.id') }}
                            </th>
                            <td>
                                {{ $doc->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.doc.fields.national_id_card_no') }}
                            </th>
                            <td>
                                @foreach($doc->nationalIdCardNo as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->national_id_card_no }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.doc.fields.doc_type') }}
                            </th>
                            <td>
                                @if($doc->docType)
                                    <span class="badge badge-relationship">{{ $doc->docType->type ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.doc.fields.upload') }}
                            </th>
                            <td>
                                @foreach($doc->upload as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.doc.fields.photo') }}
                            </th>
                            <td>
                                @foreach($doc->photo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('doc_edit')
                    <a href="{{ route('admin.docs.edit', $doc) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.docs.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection