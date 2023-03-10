<?php

namespace App\Http\Livewire\Trip;

use App\Models\Trip;
use Livewire\Component;

class Create extends Component
{
    public Trip $trip;

    public function mount(Trip $trip)
    {
        $this->trip = $trip;
    }

    public function render()
    {
        return view('livewire.trip.create');
    }

    public function submit()
    {
        $this->validate();

        $this->trip->save();

        return redirect()->route('admin.trips.index');
    }

    protected function rules(): array
    {
        return [
            'trip.trip_type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
