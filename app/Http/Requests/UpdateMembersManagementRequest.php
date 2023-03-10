<?php

namespace App\Http\Requests;

use App\Models\MembersManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMembersManagementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('members_management_edit'),
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
            'hajji_no' => [
                'string',
                'required',
            ],
            'national_id_card_no' => [
                'string',
                'required',
            ],
            'full_name' => [
                'string',
                'required',
            ],
            'phone_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }
}
