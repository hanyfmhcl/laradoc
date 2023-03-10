<?php

namespace App\Http\Requests;

use App\Models\CrmDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCrmDocumentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('crm_document_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => [
                'integer',
                'exists:crm_customers,id',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
