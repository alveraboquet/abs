<?php

namespace Database\Seeders;

use App\Models\Ranking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RankingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Ranking::create([
            'name_en' => 'Member',
            'name_cn' => '投资者',
            'min_self_sales' => 1000,

        ]);
        Ranking::create([
            'name_en' => 'Agent',
            'name_cn' => '代理',
            'min_self_sales' => 5000,
            'min_group_sales' => 5000,
            'group_performance_bonus' => 5,
        ]);
        Ranking::create([
            'name_en' => 'Manager',
            'name_cn' => '经理',
            'min_self_sales' => 8000,
            'min_group_sales' => 100000,
            'sponsor_ranking' => 2,
            'sponsor_ranking_count' => 5,
            'bonus' => 15,
            'same_level_bonus' => 5,
            'group_performance_bonus' => 5,
        ]);
        Ranking::create([
            'name_en' => 'Unit manager',
            'name_cn' => '部门经理',
            'min_self_sales' => 10000,
            'min_group_sales' => 500000,
            'sponsor_ranking' => 3,
            'sponsor_ranking_count' => 3,
            'bonus' => 30,
            'same_level_bonus' => 5,
            'group_performance_bonus' => 5,
        ]);
        Ranking::create([
            'name_en' => 'Agency manager',
            'name_cn' => '机构经理',
            'min_self_sales' => 10000,
            'min_group_sales' => 2000000,
            'sponsor_ranking' => 4,
            'sponsor_ranking_count' => 3,
            'bonus' => 45,
            'same_level_bonus' => 5,
            'group_performance_bonus' => 5,
        ]);
        Ranking::create([
            'name_en' => 'Regional manager',
            'name_cn' => '区域经理',
            'min_self_sales' => 30000,
            'min_group_sales' => 10000000,
            'sponsor_ranking' => 5,
            'sponsor_ranking_count' => 3,
            'bonus' => 60,
            'same_level_bonus' => 5,
            'group_performance_bonus' => 5,
        ]);
    }
}
