<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('national_id_card_no') ? 'invalid' : '' }}">
        <label class="form-label required" for="national_id_card_no">{{ trans('cruds.doc.fields.national_id_card_no') }}</label>
        <x-select-list class="form-control" required id="national_id_card_no" name="national_id_card_no" wire:model="national_id_card_no" :options="$this->listsForFields['national_id_card_no']" multiple />
        <div class="validation-message">
            {{ $errors->first('national_id_card_no') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.doc.fields.national_id_card_no_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('doc.doc_type_id') ? 'invalid' : '' }}">
        <label class="form-label" for="doc_type">{{ trans('cruds.doc.fields.doc_type') }}</label>
        <x-select-list class="form-control" id="doc_type" name="doc_type" :options="$this->listsForFields['doc_type']" wire:model="doc.doc_type_id" />
        <div class="validation-message">
            {{ $errors->first('doc.doc_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.doc.fields.doc_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.doc_upload') ? 'invalid' : '' }}">
        <label class="form-label" for="upload">{{ trans('cruds.doc.fields.upload') }}</label>
        <x-dropzone id="upload" name="upload" action="{{ route('admin.docs.storeMedia') }}" collection-name="doc_upload" max-file-size="5" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.doc_upload') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.doc.fields.upload_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.doc_photo') ? 'invalid' : '' }}">
        <label class="form-label" for="photo">{{ trans('cruds.doc.fields.photo') }}</label>
        <x-dropzone id="photo" name="photo" action="{{ route('admin.docs.storeMedia') }}" collection-name="doc_photo" max-file-size="2" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.doc_photo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.doc.fields.photo_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.docs.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>