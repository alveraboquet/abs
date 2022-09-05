<?php

namespace App\Http\Middleware;

use App\Models\BonusHistory;
use App\Models\Notification;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            //
            'auth.user' => function () {
                if (auth()->id()) {
                    $ids = User::where('hierarchyList', 'like', '%-' . auth()->id() . '-%')->pluck('id')->push(auth()->id());
                    $total_sharing = Order::whereIn('user_id', $ids)->sum('total_profit');
                    $weekly_sharing = BonusHistory::whereIn('user_id', $ids)->where('date_entitle', '>=', today())
                        ->where('date_entitle', '<=', today()->endOfWeek())->sum('net_bonus');

                    return collect(User::with('userRanking')->find(auth()->id()))->merge(['total_sharing' => $total_sharing, 'weekly_sharing' => $weekly_sharing]);
                }
                return null;
            },
            'notifications' => fn () => session('login_success')
                ? Notification::query()
                ->where('status', 'Active')
                ->where('popup', true)
                ->where('start_date', '<=', today())
                ->where('end_date', '>=', today())
                ->latest()
                ->get()
                : null,

            /* 'auth.user' => fn () => $request->user()
                ? $request->user()
                : null, */
        ]);
    }
}
