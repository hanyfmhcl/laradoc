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
    <div class="form-group {{ $errors->has('trip_type') ? 'invalid' : '' }}">
        <label class="form-label required" for="trip_type">{{ trans('cruds.doc.fields.trip_type') }}</label>
        <x-select-list class="form-control" required id="trip_type" name="trip_type" wire:model="trip_type" :options="$this->listsForFields['trip_type']" multiple />
        <div class="validation-message">
            {{ $errors->first('trip_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.doc.fields.trip_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('doctype') ? 'invalid' : '' }}">
        <label class="form-label required" for="doctype">{{ trans('cruds.doc.fields.doctype') }}</label>
        <x-select-list class="form-control" required id="doctype" name="doctype" wire:model="doctype" :options="$this->listsForFields['doctype']" multiple />
        <div class="validation-message">
            {{ $errors->first('doctype') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.doc.fields.doctype_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.doc_upload') ? 'invalid' : '' }}">
        <label class="form-label required" for="upload">{{ trans('cruds.doc.fields.upload') }}</label>
        <x-dropzone id="upload" name="upload" action="{{ route('admin.docs.storeMedia') }}" collection-name="doc_upload" max-file-size="5" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.doc_upload') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.doc.fields.upload_helper') }}
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