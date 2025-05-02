<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use App\Repositories\JourneyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class JourneyController extends Controller
{
    protected $journeyRepo;

    public function __construct(JourneyRepository $journeyRepo)
    {
        $this->journeyRepo = $journeyRepo;
    }

    public function index()
    {
        
        $journeys = Journey::orderBy('date_journey', 'desc')->get();
        return view('journeys.dashboard', compact('journeys'));
    }

    public function create()
    {
        return view('journeys.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_journey' => 'required|date_format:d/m/Y|unique:journeys,date_journey',
            'value_journey' => 'required|numeric',
        ]);

        $data = $request->all();
        $data['date_journey'] = Carbon::createFromFormat('d/m/Y', $request->date_journey)->format('Y-m-d');
        $this->journeyRepo->createJourney($data);

        return redirect()->route('journeys.index')->with('success', 'Jornada cadastrada com sucesso!');
    }

    public function destroy($id)
    {
        $this->journeyRepo->deleteJourney($id);

        return redirect()->route('journeys.index')->with('success', 'Jornada excluída com sucesso!');
    }

    public function weeklySummary()
    {
        $weeklyTotals = $this->journeyRepo->weeklySummary();
    
        return view('journeys.weekly-summary', compact('weeklyTotals'));
    }

}
