<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Http\Resources\Admin\TripResource;
use App\Models\Trip;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TripApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('trip_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TripResource(Trip::with(['owner'])->get());
    }

    public function store(StoreTripRequest $request)
    {
        $trip = Trip::create($request->validated());

        return (new TripResource($trip))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Trip $trip)
    {
        abort_if(Gate::denies('trip_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TripResource($trip->load(['owner']));
    }

    public function update(UpdateTripRequest $request, Trip $trip)
    {
        $trip->update($request->validated());

        return (new TripResource($trip))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Trip $trip)
    {
        abort_if(Gate::denies('trip_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trip->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
