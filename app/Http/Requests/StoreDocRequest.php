<?php

namespace App\Http\Requests;

use App\Models\Doc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDocRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('doc_create'),
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
            'national_id_card_no' => [
                'required',
                'array',
            ],
            'national_id_card_no.*.id' => [
                'integer',
                'exists:members_managements,id',
            ],
            'trip_type' => [
                'required',
                'array',
            ],
            'trip_type.*.id' => [
                'integer',
                'exists:trips,id',
            ],
            'doctype' => [
                'required',
                'array',
            ],
            'doctype.*.id' => [
                'integer',
                'exists:documents,id',
            ],
        ];
    }
}
