<?php

namespace App\Http\Livewire\Document;

use App\Models\Document;
use Livewire\Component;

class Create extends Component
{
    public Document $document;

    public function mount(Document $document)
    {
        $this->document = $document;
    }

    public function render()
    {
        return view('livewire.document.create');
    }

    public function submit()
    {
        $this->validate();

        $this->document->save();

        return redirect()->route('admin.documents.index');
    }

    protected function rules(): array
    {
        return [
            'document.type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
