<?php

namespace App\Http\Livewire\MembersManagement;

use App\Models\MembersManagement;
use Livewire\Component;

class Edit extends Component
{
    public MembersManagement $membersManagement;

    public function mount(MembersManagement $membersManagement)
    {
        $this->membersManagement = $membersManagement;
    }

    public function render()
    {
        return view('livewire.members-management.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->membersManagement->save();

        return redirect()->route('admin.members-managements.index');
    }

    protected function rules(): array
    {
        return [
            'membersManagement.hajji_no' => [
                'string',
                'required',
            ],
            'membersManagement.national_id_card_no' => [
                'string',
                'required',
            ],
            'membersManagement.full_name' => [
                'string',
                'required',
            ],
            'membersManagement.phone_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }
}
