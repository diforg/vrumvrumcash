<?php

namespace App\Repositories;

use App\Models\Journey;

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
    
}