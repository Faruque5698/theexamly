<?php

namespace App\Http\Controllers\Backend\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Backend\Coupon;
use App\Models\Backend\Course;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::where('use_status', '=', 0)->where('expires_at','>',date('Y-m-d'))->orderBy('id', 'desc')->get();

        return view('backend.pages.coupon.index', compact('coupons'));
    }

    public function create()
    {
        $coupon = null;
        $course_category = Course::where('status',1)->where('short_name','!=','null')->get()->pluck('short_name', 'short_name');

        return view('backend.pages.coupon.create', compact('coupon','course_category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'coupon_number' => 'required|numeric',
            'prefix' => 'required|min:2',
            'ammount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ], [
            'coupon_number.required' => 'Number of Coupon field is required',
            'ammount.required' => 'Ammount field is required'
        ]);

        $count = $request->coupon_number;
        $prefix = $request->prefix;
        $ammount = $request->ammount;

        if ($request->coupon_number > 0) {
            for ($x = 0; $x < $count; $x++) {
                $code = abs(crc32(uniqid()));
                $name = $prefix . $ammount . $this->random_str(4);

                $cupon = new Coupon();
                $cupon->code = $code;
                $cupon->name = $name;
                $cupon->prefix = $request->prefix;
                $cupon->discount_amount = $ammount;
                $cupon->starts_at = $request->start_date;
                $cupon->expires_at = $request->end_date;

                $CouponExists = Coupon::where('name', '=', $name)->where('use_status', '=', 0)->count();
                if ($CouponExists === 0) {
                    $cupon->save();
                } else {
                    $count++;
                }
            }
        }
        $message = $request->coupon_number . ' ' . 'Coupons have created successfully.';

        return redirect()->route('admin.coupon.index')->with('success', $message);
    }

    public function search()
    {
        return view('backend.pages.coupon.search');
    }

    /*
     * Generate random strings
     *
     * Length of $length string
     */
    // public function random_str($length)
    // {
    //     // Password Character Set, you can add any character you need
    //     $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz';
    //     $str = '';
    //     for ($i = 0; $i < $length; $i++) {
    //         $str .= $chars[mt_rand(0, strlen($chars) - 1)];
    //     }

    //     return $str;
    // } 

    public function random_str($length)
    {
        // Password Character Set, you can add any character you need
        $numeric = '0123456789';
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $numeric[mt_rand(0, strlen($numeric) - 1)];
        }

        return $str;
    }

    public function searchResult(Request $request)
    {
      $coupons = QueryBuilder::for(Coupon::class)
      ->allowedFilters(['name','discount_amount','prefix',AllowedFilter::exact('use_status'),AllowedFilter::scope('starts_before')])
      ->get();
      return view('backend.pages.coupon.searchResult', compact('coupons'));
    }

    public function show($id)
    {
        $coupon = Coupon::findOrFail($id);

        return response()->json(['success' => true, 'coupon' => $coupon]);
    }
}
