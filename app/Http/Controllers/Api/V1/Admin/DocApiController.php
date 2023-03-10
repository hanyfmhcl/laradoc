<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreDocRequest;
use App\Http\Requests\UpdateDocRequest;
use App\Http\Resources\Admin\DocResource;
use App\Models\Doc;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DocApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('doc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocResource(Doc::with(['nationalIdCardNo', 'tripType', 'doctype', 'owner'])->get());
    }

    public function store(StoreDocRequest $request)
    {
        $doc = Doc::create($request->validated());
        $doc->nationalIdCardNo()->sync($request->input('nationalIdCardNo', []));
        $doc->tripType()->sync($request->input('tripType', []));
        $doc->doctype()->sync($request->input('doctype', []));
        if ($request->input('doc_upload', false)) {
            $doc->addMedia(storage_path('tmp/uploads/' . basename($request->input('doc_upload'))))->toMediaCollection('doc_upload');
        }

        return (new DocResource($doc))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Doc $doc)
    {
        abort_if(Gate::denies('doc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocResource($doc->load(['nationalIdCardNo', 'tripType', 'doctype', 'owner']));
    }

    public function update(UpdateDocRequest $request, Doc $doc)
    {
        $doc->update($request->validated());
        $doc->nationalIdCardNo()->sync($request->input('nationalIdCardNo', []));
        $doc->tripType()->sync($request->input('tripType', []));
        $doc->doctype()->sync($request->input('doctype', []));
        if ($request->input('doc_upload', false)) {
            if (! $doc->doc_upload || $request->input('doc_upload') !== $doc->doc_upload->file_name) {
                if ($doc->doc_upload) {
                    $doc->doc_upload->delete();
                }
                $doc->addMedia(storage_path('tmp/uploads/' . basename($request->input('doc_upload'))))->toMediaCollection('doc_upload');
            }
        } elseif ($doc->doc_upload) {
            $doc->doc_upload->delete();
        }

        return (new DocResource($doc))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Doc $doc)
    {
        abort_if(Gate::denies('doc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doc->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
