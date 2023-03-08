<?php

namespace App\Http\Livewire\Doc;

use App\Models\Doc;
use App\Models\Document;
use App\Models\MembersManagement;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Doc $doc;

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

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
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
        $this->doc                 = $doc;
        $this->national_id_card_no = $this->doc->nationalIdCardNo()->pluck('id')->toArray();
        $this->initListsForFields();
        $this->mediaCollections = [

            'doc_upload' => $doc->upload,
            'doc_photo'  => $doc->photo,
        ];
    }

    public function render()
    {
        return view('livewire.doc.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->doc->save();
        $this->doc->nationalIdCardNo()->sync($this->national_id_card_no);
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
            'doc.doc_type_id' => [
                'integer',
                'exists:documents,id',
                'nullable',
            ],
            'mediaCollections.doc_upload' => [
                'array',
                'nullable',
            ],
            'mediaCollections.doc_upload.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.doc_photo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.doc_photo.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['national_id_card_no'] = MembersManagement::pluck('national_id_card_no', 'id')->toArray();
        $this->listsForFields['doc_type']            = Document::pluck('type', 'id')->toArray();
    }
}
