<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('trip.trip_type') ? 'invalid' : '' }}">
        <label class="form-label" for="trip_type">{{ trans('cruds.trip.fields.trip_type') }}</label>
        <input class="form-control" type="text" name="trip_type" id="trip_type" wire:model.defer="trip.trip_type">
        <div class="validation-message">
            {{ $errors->first('trip.trip_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.trip.fields.trip_type_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.trips.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>