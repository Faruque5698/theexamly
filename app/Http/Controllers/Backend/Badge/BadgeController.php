<?php

namespace App\Http\Controllers\Backend\Badge;

use App\Http\Controllers\Controller;
use App\Models\Backend\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BadgeController extends Controller
{
    public function index()
    {
        $badges = Badge::get();
        return view('backend.pages.badge.index', compact('badges')); 
    }

    public function create()
    {
        $badge = null;
        return view('backend.pages.badge.create', compact('badge'));
    }

    public function store(Request $request)
    {
        try
        {
            $data = request()->validate([
                'top_text' => 'required',
                'bottom_text'=>'required',
            ]);

            $badge = Badge::create([
                'top_text' => $request->top_text,
                'bottom_text'=> $request->bottom_text,
                'created_by' => Auth::id()
            ]);

            $status = 'success';
            $message = 'Badge Created Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.badges.index')->with($status, $message);
    }

    public function edit(Badge $badge)
    {
        return view('backend.pages.badge.create', compact('badge'));
    }

    public function update(Request $request, Badge $badge)
    {
        try
        {
            $data = request()->validate([
                'top_text' => 'required',
                'bottom_text'=>'required',
            ]);

            $badge->update([
                'top_text' => $request->top_text,
                'bottom_text'=> $request->bottom_text,
                'updated_by' => Auth::id()
            ]);


            $status = 'success';
            $message = 'Badge Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.badges.index')->with($status, $message);
    }
}
