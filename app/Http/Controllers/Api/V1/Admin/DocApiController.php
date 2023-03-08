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

        return new DocResource(Doc::with(['nationalIdCardNo', 'docType'])->get());
    }

    public function store(StoreDocRequest $request)
    {
        $doc = Doc::create($request->validated());
        $doc->nationalIdCardNo()->sync($request->input('nationalIdCardNo', []));
        foreach ($request->input('doc_upload', []) as $file) {
            $doc->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('doc_upload');
        }

        foreach ($request->input('doc_photo', []) as $file) {
            $doc->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('doc_photo');
        }

        return (new DocResource($doc))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Doc $doc)
    {
        abort_if(Gate::denies('doc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocResource($doc->load(['nationalIdCardNo', 'docType']));
    }

    public function update(UpdateDocRequest $request, Doc $doc)
    {
        $doc->update($request->validated());
        $doc->nationalIdCardNo()->sync($request->input('nationalIdCardNo', []));
        if (count($doc->doc_upload) > 0) {
            foreach ($doc->doc_upload as $media) {
                if (! in_array($media->file_name, $request->input('doc_upload', []))) {
                    $media->delete();
                }
            }
        }
        $media = $doc->doc_upload->pluck('file_name')->toArray();
        foreach ($request->input('doc_upload', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $doc->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('doc_upload');
            }
        }

        if (count($doc->doc_photo) > 0) {
            foreach ($doc->doc_photo as $media) {
                if (! in_array($media->file_name, $request->input('doc_photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $doc->doc_photo->pluck('file_name')->toArray();
        foreach ($request->input('doc_photo', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $doc->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('doc_photo');
            }
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
