<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('membersManagement.hajji_no') ? 'invalid' : '' }}">
        <label class="form-label required" for="hajji_no">{{ trans('cruds.membersManagement.fields.hajji_no') }}</label>
        <input class="form-control" type="text" name="hajji_no" id="hajji_no" required wire:model.defer="membersManagement.hajji_no">
        <div class="validation-message">
            {{ $errors->first('membersManagement.hajji_no') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membersManagement.fields.hajji_no_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('membersManagement.national_id_card_no') ? 'invalid' : '' }}">
        <label class="form-label required" for="national_id_card_no">{{ trans('cruds.membersManagement.fields.national_id_card_no') }}</label>
        <input class="form-control" type="text" name="national_id_card_no" id="national_id_card_no" required wire:model.defer="membersManagement.national_id_card_no">
        <div class="validation-message">
            {{ $errors->first('membersManagement.national_id_card_no') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membersManagement.fields.national_id_card_no_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('membersManagement.full_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="full_name">{{ trans('cruds.membersManagement.fields.full_name') }}</label>
        <input class="form-control" type="text" name="full_name" id="full_name" required wire:model.defer="membersManagement.full_name">
        <div class="validation-message">
            {{ $errors->first('membersManagement.full_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membersManagement.fields.full_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('membersManagement.phone_number') ? 'invalid' : '' }}">
        <label class="form-label required" for="phone_number">{{ trans('cruds.membersManagement.fields.phone_number') }}</label>
        <input class="form-control" type="number" name="phone_number" id="phone_number" required wire:model.defer="membersManagement.phone_number" step="1">
        <div class="validation-message">
            {{ $errors->first('membersManagement.phone_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membersManagement.fields.phone_number_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.members-managements.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>