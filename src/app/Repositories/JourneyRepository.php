<?php

namespace App\Repositories;

use App\Models\Journey;
use Illuminate\Support\Carbon;

class JourneyRepository
{
    public function createJourney(array $data)
    {
        return Journey::create($data);
    }

    public function deleteJourney($id)
    {
        $journey = Journey::findOrFail($id);
        $journey->delete();
    }

    public function getAllJourneys()
    {
        return Journey::all();
    }

    public function weeklySummary()
    {
        return Journey::selectRaw('
            YEAR(date_journey) as year,
            DATE_FORMAT(date_journey, "%Y/%m") as month,
            WEEK(date_journey, 1) as week,
            SUM(value_journey) as total,
            MIN(date_journey) as week_start
        ')
        ->groupByRaw('YEAR(date_journey), DATE_FORMAT(date_journey, "%Y/%m"), WEEK(date_journey, 1)')
        ->orderByDesc('year')
        ->orderByDesc('month')
        ->orderByDesc('week')
        ->get()
        ->map(function ($item) {
            $start = Carbon::parse($item->week_start)->startOfWeek(Carbon::MONDAY);
            $end = $start->copy()->addDays(6);
            $item->week_range = $start->format('d/m') . ' a ' . $end->format('d/m');
            return $item;
        });
    }    

}