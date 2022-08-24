<?php

namespace App\Http\Controllers;

use App\Models\Profit;
use App\Models\Ranking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    //
    public function home()
    {
        $yesterday = Carbon::yesterday()->format("Y-m-d");

        $yesterdayProfit = Profit::firstWhere('date', $yesterday);
        // dd($yesterdayProfit);
        $lastWeekProfit = Profit::whereBetween('date', [Carbon::yesterday()->subDay(6), $yesterday])->get();
        $chartProfit = $lastWeekProfit->pluck('profit_1');
        $chartDate = $lastWeekProfit->pluck('date');
        //dd(Carbon::yesterday()->subDay(7)->format('Y-m-d'));
        $monthlyProfit = Profit::whereBetween('date', [Carbon::now()->startOfMonth(), $yesterday])->pluck('profit_1')->sum();
        $accumulateProfit = Profit::whereBetween('date', [Carbon::now()->startOfYear(), $yesterday])->pluck('profit_1')->sum();

        $data = [];
        return Inertia::render('Home', [
            'yesterdayProfit' => $yesterdayProfit,
            'lastWeekProfit' => [
                'date' => $chartDate,
                'profit' => $chartProfit
            ],
            'monthlyProfit' => $monthlyProfit,
            'accumulateProfit' => $accumulateProfit,
        ]);
    }

    public function getDownline(Request $request)
    {
        $id = $request->id ?? null;
        $search = $request->search;
        if ($search) {
            $rootUsers = User::query()->where(function ($q) use ($search) {
                $q->where('hierarchyList', 'like', '%-' . Auth::id() . '-%')->orWhere('id', Auth::id());
            })
                ->where('username', 'like', "%{$search}%")
                ->with(['children'])->get();
        } else {
            $rootUsers = User::query()->where('id', Auth::id())
                ->with(['children'])->get();
        }

        $directUsers = User::where('referral', Auth::id())->get();

        return Inertia::render('MyTeam', [
            'users' => $rootUsers,
            'directUsers' => $directUsers,
            'filters' => $request->only(['search']),
        ]);
    }
    public function getMember()
    {
        $users = User::all();
        $rankings = Ranking::all();
        return Inertia::render('ManageMember', [
            'users' => $users,
            'ranking' => $rankings,
        ]);
    }

    public function delete(Request $request)
    {
        dd(User::find($request->id));
    }

    public function calculateProfit()
    {
        $now = now();
        $days = $now->daysInMonth;
        $maxProfit = 12;
        $percentagePerDay = array();
        $profitPerDay = array();
        for ($i = 0; $i < $days; $i++) {
            //  $rand = $this->float_rand(0, 1, 4);
            $rand = rand(1, 100);
            $percentagePerDay[$i] = $rand;
        }
        $sumPercentage = collect($percentagePerDay)->sum();
        for ($i = 0; $i < $days; $i++) {
            $profit = $percentagePerDay[$i] / $sumPercentage * $maxProfit;
            $profitPerDay[$i] = round($profit, 4);
        }
        $sumProfit = round(collect($profitPerDay)->sum(), 4);
        $overflow = $maxProfit - round($sumProfit, 4);
        $profitPerDay[rand(0, $days - 1)] += $overflow;



        //split to 3
        $randPerDay = array();
        for ($i = 0; $i < $days; $i++) {
            $randArr = array();
            for ($j = 0; $j < 3; $j++) {
                $rand = rand(1, 100);
                $randArr[$j] = $rand;
            }
            $randPerDay[$i] = $randArr;
        }
        $sumRandPerDay = array();
        $sumRandPerDay =  collect($randPerDay)->map(function ($item) {
            return collect($item)->sum();
        })->toArray();



        $realProfit = array();
        for ($i = 0; $i < $days; $i++) {
            $eachProfit = array();
            for ($j = 0; $j < 3; $j++) {

                $profit = $randPerDay[$i][$j] / $sumRandPerDay[$i] * $profitPerDay[$i];
                $eachProfit[$j] = round($profit, 4);
            }

            $sumEachProfit = round(collect($eachProfit)->sum(), 4);
            $overflow = $profitPerDay[$i] - round($sumEachProfit, 4);

            $eachProfit[rand(0, 2)] += $overflow;

            $realProfit[$i] = $eachProfit;
        }

        $date = Carbon::parse("2022-08-01")->startOfMonth();
        for ($i = 0; $i < $days; $i++) {

            Profit::create([
                'date' => $date,
                'year' => $date->year,
                'month' => $date->month,
                'day' => $date->day,
                'total_profit' => $profitPerDay[$i],
                'profit_1' => $realProfit[$i][0],
                'profit_2' => $realProfit[$i][1],
                'profit_3' => $realProfit[$i][2],
            ]);
            $date->addDay(1);
        }
        return true;
    }

    /**
     * Generate Float Random Number
     *
     * @param float $Min Minimal value
     * @param float $Max Maximal value
     * @param int $round The optional number of decimal digits to round to. default 0 means not round
     * @return float Random float value
     */
    function float_rand($Min, $Max, $round = 0)
    {
        //validate input
        if ($Min > $Max) {
            $min = $Max;
            $max = $Min;
        } else {
            $min = $Min;
            $max = $Max;
        }
        $randomfloat = $min + mt_rand() / mt_getrandmax() * ($max - $min);
        if ($round > 0)
            $randomfloat = round($randomfloat, $round);

        return $randomfloat;
    }
}
