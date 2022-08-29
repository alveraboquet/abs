<?php

namespace App\Http\Controllers;

use App\Models\Profit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProfitController extends Controller
{
    //


    public function calculateProfit()
    {

        $date = today()->startOfMonth();
        $exists = Profit::where('date', $date)->exists();
        if ($exists) return "Already exist";



        $days = $date->daysInMonth;
        $maxProfit = 12;
        $percentagePerDay = array();
        $profitPerDay = array();
        for ($i = 0; $i < $days; $i++) {
            $rand = $this->float_rand(0, 1, 4);
            //$rand = rand(1, 100);
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


        for ($i = 0; $i < $days; $i++) {
            $eachProfit = round($profitPerDay[$i] / 3, 4);
            Profit::create([
                'date' => $date,
                'year' => $date->year,
                'month' => $date->month,
                'day' => $date->day,
                'total_profit' => $profitPerDay[$i],
                'profit_1' => $eachProfit,
                'profit_2' => $eachProfit,
                'profit_3' => $eachProfit,
            ]);
            $date->addDay(1);
        }
        return "Success";
    }


    public function calculateProfitV2()
    {
        $date = today()->startOfMonth();
        $exists = Profit::where('date', $date)->exists();
        if ($exists) return "Already exist";



        $days = $date->daysInMonth;
        $maxProfit = 12;
        $percentagePerDay = array();
        $profitPerDay = array();
        for ($i = 0; $i < $days; $i++) {
            $rand = $this->float_rand(0, 1, 4);
            //$rand = rand(1, 100);
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



        for ($i = 0; $i < $days; $i++) {
            $eachProfit = $profitPerDay[$i] / 3;
            Profit::create([
                'date' => $date,
                'year' => $date->year,
                'month' => $date->month,
                'day' => $date->day,
                'total_profit' => $profitPerDay[$i],
                'profit_1' => $eachProfit,
                'profit_2' => $eachProfit,
                'profit_3' => $eachProfit,
            ]);
            $date->addDay(1);
        }
        return "Success";
    }

    public function calculateProfitOld()
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
