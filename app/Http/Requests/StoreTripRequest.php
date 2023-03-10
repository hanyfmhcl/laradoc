<?php

namespace App\Http\Requests;

use App\Models\Trip;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTripRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('trip_create'),
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
            'trip_type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
