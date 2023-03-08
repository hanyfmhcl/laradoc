<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('members_management_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="MembersManagement" format="csv" />
                <livewire:excel-export model="MembersManagement" format="xlsx" />
                <livewire:excel-export model="MembersManagement" format="pdf" />
            @endif


            @can('members_management_create')
                <x-csv-import route="{{ route('admin.members-managements.csv.store') }}" />
            @endcan

        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.membersManagement.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.membersManagement.fields.hajji_no') }}
                            @include('components.table.sort', ['field' => 'hajji_no'])
                        </th>
                        <th>
                            {{ trans('cruds.membersManagement.fields.national_id_card_no') }}
                            @include('components.table.sort', ['field' => 'national_id_card_no'])
                        </th>
                        <th>
                            {{ trans('cruds.membersManagement.fields.full_name') }}
                            @include('components.table.sort', ['field' => 'full_name'])
                        </th>
                        <th>
                            {{ trans('cruds.membersManagement.fields.phone_number') }}
                            @include('components.table.sort', ['field' => 'phone_number'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($membersManagements as $membersManagement)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $membersManagement->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $membersManagement->id }}
                            </td>
                            <td>
                                {{ $membersManagement->hajji_no }}
                            </td>
                            <td>
                                {{ $membersManagement->national_id_card_no }}
                            </td>
                            <td>
                                {{ $membersManagement->full_name }}
                            </td>
                            <td>
                                {{ $membersManagement->phone_number }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('members_management_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.members-managements.show', $membersManagement) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('members_management_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.members-managements.edit', $membersManagement) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('members_management_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $membersManagement->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $membersManagements->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush