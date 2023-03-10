<?php

namespace App\Http\Livewire\Doc;

use App\Models\Doc;
use App\Models\Document;
use App\Models\MembersManagement;
use App\Models\Trip;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Doc $doc;

    public array $doctype = [];

    public array $trip_type = [];

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public array $national_id_card_no = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->doc->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Doc $doc)
    {
        $this->doc = $doc;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.doc.create');
    }

    public function submit()
    {
        $this->validate();

        $this->doc->save();
        $this->doc->nationalIdCardNo()->sync($this->national_id_card_no);
        $this->doc->tripType()->sync($this->trip_type);
        $this->doc->doctype()->sync($this->doctype);
        $this->syncMedia();

        return redirect()->route('admin.docs.index');
    }

    protected function rules(): array
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
            'mediaCollections.doc_upload' => [
                'array',
                'required',
            ],
            'mediaCollections.doc_upload.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['national_id_card_no'] = MembersManagement::pluck('national_id_card_no', 'id')->toArray();
        $this->listsForFields['trip_type']           = Trip::pluck('trip_type', 'id')->toArray();
        $this->listsForFields['doctype']             = Document::pluck('type', 'id')->toArray();
    }
}
