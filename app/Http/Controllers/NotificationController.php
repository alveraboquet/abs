<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;

class NotificationController extends Controller
{
    //
    public function index()
    {
        $lists = Notification::latest()->get();
        return Inertia::render('Notifications', compact('lists'));
    }

    public function getNotification(Request $request, $id)
    {
        $notification = Notification::find($id);
        return Inertia::render('NotificationView', compact('notification'));
    }

    public function manageNotification(Request $request)
    {
        $lists = Notification::latest()->get();
        return Inertia::render('ManageNotification', compact('lists'));
    }

    public function updateNotification(Request $request)
    {

        $request->validate([
            'id' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
            'image' => ['nullable'],
            'start_date' => ['required'],
            'status' => ['required'],
            'popup' => ['required'],
        ]);
        $notification = Notification::find($request->id);


        $image = $request->file('image');
        if ($image) {
            File::delete(public_path($notification->image));
            $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $image->getClientOriginalExtension();
            $image->move("uploads/announcements", $image_name);

            $notification->image = $image_name;
        }

        $notification->title = $request->title;
        $notification->content = $request->content;
        $notification->start_date = Carbon::parse($request->start_date, 'UTC')->addHour(($request->timezone / 60) * -1)->format('Y-m-d');
        $notification->end_date = Carbon::parse($request->end_date, 'UTC')->addHour(($request->timezone / 60) * -1)->format('Y-m-d');
        $notification->status = $request->status;
        $notification->popup = $request->popup;
        $notification->save();


        return back()->banner('Update Successful');
    }
    public function createNotification(Request $request)
    {
        //  dd(Carbon::parse($request->start_date, 'UTC')->addHour(($request->timezone / 60) * -1)->format('Y-m-d'));
        $request->validate([
            'title' => ['required'],
            'content' => ['required'],
            'image' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'status' => ['required'],
            'popup' => ['required'],
        ]);

        $image = $request->file('image');
        $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $image->getClientOriginalExtension();
        $image->move("uploads/announcements", $image_name);

        Notification::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image_name,
            'start_date' => Carbon::parse($request->start_date, 'UTC')->addHour(($request->timezone / 60) * -1)->format('Y-m-d'),
            'end_date' => Carbon::parse($request->end_date, 'UTC')->addHour(($request->timezone / 60) * -1)->format('Y-m-d'),
            'status' => $request->status,
            'popup' => $request->popup,
        ]);

        return back()->banner('Create Successful');
    }
}
