<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutDetail;
use App\Models\WorkoutSession;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure only authenticated users can access the methods in this controller
    }

    public function index()
    {
        return view('dashboard');
    }

    public function maxWeights()
    {
        $userId = Auth::id();
        $maxWeights = WorkoutSession::where('user_id', $userId)
            ->with('exercises')
            ->get()
            ->flatMap(function($session) {
                return $session->exercises->map(function($exercise) {
                    return [
                        'name' => $exercise->name,
                        'max_weight' => $exercise->pivot->weight
                    ];
                });
            })
            ->groupBy('name')
            ->map(function($exercises) {
                return $exercises->max('max_weight');
            });

        return view('max_weights', compact('maxWeights'));
    }
}

