<?php

namespace App\Http\Controllers;

use App\Models\Egg;
use App\Http\Requests\StoreEggRequest;
use App\Http\Requests\UpdateEggRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EggController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $eggs = [
            Egg::sum('peewee_count'),
            Egg::sum('pullet_count'),
            Egg::sum('small_count'),
            Egg::sum('medium_count'),
            Egg::sum('large_count'),
            Egg::sum('extra_large_count'),
            Egg::sum('jumbo_count'),
            Egg::sum('crack_count')
        
        ];

        $dailysum = null;
        // $today = Egg::whereDate('sorting_date','', Carbon::today())->toDateString();
        $today = Carbon::today()->toDateString();
        $todayEggs = Egg::whereDate('sorting_date', $today)->get();
        
        if(count($todayEggs) > 0){
            $dailysum = $todayEggs[0]->peewee_count + $todayEggs[0]->pullet_count + $todayEggs[0]->small_count + $todayEggs[0]->medium_count + $todayEggs[0]->large_count + $todayEggs[0]->extra_large_count + $todayEggs[0]->jumbo_count;
        }

        // For this week (starting from Monday)
        $startDateOfWeek = Carbon::now()->startOfWeek(); // Assuming Monday is the start of the week
        $endDateOfWeek = Carbon::now()->endOfWeek();

        $weeklyEggs = Egg::whereBetween('sorting_date', [$startDateOfWeek, $endDateOfWeek])->get();

        $weeklySum = 0;
        $weeklySumCrack = 0;

        $weekly_by_type = [0,0,0,0,0,0,0];

        foreach ($weeklyEggs as $day) {
            $weeklySum += $day->peewee_count +
                  $day->pullet_count +
                  $day->small_count +
                  $day->medium_count +
                  $day->large_count +
                  $day->extra_large_count +
                  $day->jumbo_count;
            $weeklySumCrack += $day->crack_count;

            $weekly_by_type[0] += $day->peewee_count;
            $weekly_by_type[1] += $day->pullet_count;
            $weekly_by_type[2] += $day->small_count;
            $weekly_by_type[3] += $day->medium_count;
            $weekly_by_type[4] += $day->large_count;
            $weekly_by_type[5] += $day->extra_large_count;
            $weekly_by_type[6] += $day->jumbo_count;
        }

        // For this month
        $startDateOfMonth = Carbon::now()->startOfMonth();
        $endDateOfMonth = Carbon::now()->endOfMonth();

        $monthlyEggs = Egg::whereBetween('sorting_date', [$startDateOfMonth, $endDateOfMonth])->get();


        $monthlySum = 0;
        $monthlySumCrack = 0;

        $monthly_by_type = [0,0,0,0,0,0,0];

        foreach ($monthlyEggs as $day) {
            $monthlySum += $day->peewee_count +
                  $day->pullet_count +
                  $day->small_count +
                  $day->medium_count +
                  $day->large_count +
                  $day->extra_large_count +
                  $day->jumbo_count;
            $monthlySumCrack += $day->crack_count;

            $monthly_by_type[0] += $day->peewee_count;
            $monthly_by_type[1] += $day->pullet_count;
            $monthly_by_type[2] += $day->small_count;
            $monthly_by_type[3] += $day->medium_count;
            $monthly_by_type[4] += $day->large_count;
            $monthly_by_type[5] += $day->extra_large_count;
            $monthly_by_type[6] += $day->jumbo_count;

        }

        $data = [
            $eggs,
            $todayEggs,
            $dailysum,
            $weeklyEggs,
            $weeklySum,
            $weeklySumCrack,
            $monthlyEggs,
            $monthlySum,
            $monthlySumCrack,
            $weekly_by_type,
            $monthly_by_type,
        ];

        return view('dashboard')->with('data', $data);
    }

    public function index(Request $request)
    {

        if ($request->date == null) {
            $eggs = Egg::orderBy('sorting_date', 'desc')->paginate(20);
            return view('egg.index')->with('eggs', $eggs);
        } else {
            $d = date("Y-m-d", strtotime($request->date));  
            $eggs = Egg::whereDate('sorting_date', $d)->paginate(20);
            return view('egg.index')->with('eggs', $eggs);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEggRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $egg = Egg::find($id);
        $sum = $egg->peewee_count + $egg->pullet_count + $egg->small_count + $egg->medium_count + $egg->large_count + $egg->extra_large_count + $egg->jumbo_count;
        $data = [
                    $egg,
                    [
                        $egg->peewee_count,
                        $egg->pullet_count,
                        $egg->small_count,
                        $egg->medium_count,
                        $egg->large_count,
                        $egg->extra_large_count,
                        $egg->jumbo_count,
                        $egg->crack_count
                    ],
                    $sum
                ];
        return view('egg.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Egg $egg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEggRequest $request, Egg $egg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Egg $egg)
    {
        //
    }
}
