<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tour;
use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TourResource;

class TourController extends Controller
{
    function index(Travel $travel) {
        // Tour::where('travel_id', $travel->id)
        $tours = $travel->tours()->orderBy('starting_date')->paginate();

        return TourResource::collection($tours);
    }
}
