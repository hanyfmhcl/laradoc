<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreCrmDocumentRequest;
use App\Http\Requests\UpdateCrmDocumentRequest;
use App\Http\Resources\Admin\CrmDocumentResource;
use App\Models\CrmDocument;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CrmDocumentApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('crm_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CrmDocumentResource(CrmDocument::with(['customer'])->get());
    }

    public function store(StoreCrmDocumentRequest $request)
    {
        $crmDocument = CrmDocument::create($request->validated());

        if ($request->input('crm_document_document_file', false)) {
            $crmDocument->addMedia(storage_path('tmp/uploads/' . basename($request->input('crm_document_document_file'))))->toMediaCollection('crm_document_document_file');
        }

        return (new CrmDocumentResource($crmDocument))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CrmDocument $crmDocument)
    {
        abort_if(Gate::denies('crm_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CrmDocumentResource($crmDocument->load(['customer']));
    }

    public function update(UpdateCrmDocumentRequest $request, CrmDocument $crmDocument)
    {
        $crmDocument->update($request->validated());

        if ($request->input('crm_document_document_file', false)) {
            if (! $crmDocument->crm_document_document_file || $request->input('crm_document_document_file') !== $crmDocument->crm_document_document_file->file_name) {
                if ($crmDocument->crm_document_document_file) {
                    $crmDocument->crm_document_document_file->delete();
                }
                $crmDocument->addMedia(storage_path('tmp/uploads/' . basename($request->input('crm_document_document_file'))))->toMediaCollection('crm_document_document_file');
            }
        } elseif ($crmDocument->crm_document_document_file) {
            $crmDocument->crm_document_document_file->delete();
        }

        return (new CrmDocumentResource($crmDocument))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CrmDocument $crmDocument)
    {
        abort_if(Gate::denies('crm_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmDocument->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
