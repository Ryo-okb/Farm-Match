<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\Land;
use App\Models\Reservation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;



class FarmController extends Controller
{
    public function login(){
        return view('login');
    }

    public function list(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('farm')->attempt($credentials)) {
            // ログイン成功時の処理
            $user = Auth::guard('farm')->user();
    
            if ($user->role == 1) {
                // 管理ユーザーの場合
                $lands = Land::where('del_flg', 0)->with('reservations.user')->get();
                $reservations = Reservation::all();
                return view('admin-list', compact('user', 'lands', 'reservations'));
            } else {
                // 一般ユーザーの場合
                $lands = Land::where('del_flg', 0)->get();
                return view('list', compact('lands'));
            }
        } else {
            // ログイン失敗時の処理
            Session::flash('error', 'ログインに失敗しました。');
            return redirect()->back();
        }
    }
    

  


    public function showsignup(){
        return view('signup');
    }
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tel' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'password' => 'required|min:6',
            
        ]);
    
        // ユーザーの作成
        Farm::create([
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            
        ]);
        return view('signcomp');
    }
    public function showPostForm()
    {
        return view('post');
    }

    public function createPost(Request $request)
    {
        $request->validate([
         
            'address' => 'required',
            'area' => 'required',
            'way' => 'required',
        ]);

        $user = Auth::guard('farm')->user(); 
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $image = basename($imagePath);
        } else {
            $image = null;
        }


        Land::create([
            'name' => $user->name,
            'address' => $request->address,
            'area' => $request->area,
            'way' => $request->way,
            'user_id' => $user->id,
            'image' => $image,
        ]);
        $lands = Land::all();
        return view('list', compact('lands'));
      
    }

    public function detail($id)
    {
        $land = Land::find($id);

        if (!$land) {
            abort(404); 
        }

        return view('detail', compact('land'));
    }
    public function showReservationForm($id)
    {
        // ログインしているユーザーの名前を取得
        $user = Auth::guard('farm')->user();
        
        $land = Land::find($id);
        $bookedDates = Reservation::where('land_id', $id)->pluck('reservation_date')->toArray();
    
        // 予約済みの日付を除外して、利用可能な日程を取得
        $availableDates = collect();
        $currentDate = now()->startOfDay();
        $endDate = now()->addMonths(3)->endOfDay();
    
        while ($currentDate <= $endDate) {
            $dateString = $currentDate->toDateString();
            if (!in_array($dateString, $bookedDates)) {
                $availableDates->push($dateString);
            }
            $currentDate->addDay();
        }
    
        return view('reservation', compact('land', 'user', 'availableDates'));
    }
    

    public function createReservation(Request $request)
    {
        $user = Auth::guard('farm')->user();
        $land = Land::find($request->land_id);
        
        
        // 予約の作成
        $reservation = Reservation::create([
            'user_id' => $user->id,
            'land_id' => $land->id,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
        ]);
        

        return view('reservecomp');
        
    }

    public function mypage()
    {
        $user = Auth::guard('farm')->user();

        // 予約した土地情報と投稿した土地情報を取得
        $reservedLands = $user->reservations()->with('land', 'land.reservations')->get();
        $postedLands = $user->postedLands()->where('del_flg',0)->get();

        return view('mypage', compact('reservedLands', 'postedLands'));
    }


    

    public function listback(){
        $lands = Land::where('del_flg', 0)->with('reservations.user')->get();
        return view('list',compact('lands'));
        
    }

    public function showResetForm()
    {
        return view('password.reset');
    }
    
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'tel' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
    
        $user = Farm::where('email', $request->email)->where('tel', $request->tel)->first();
    
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'ユーザーが見つかりませんでした。']);
        }
    
        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();
    
        return redirect()->route('login')->with('status', 'パスワードがリセットされました。');
    }

    public function editPost($id)
    {
        $land = Land::find($id);

        if (!$land) {
        abort(404); 
        }

        return view('edit', compact('land'));
    }

    public function updatePost(Request $request, $id)
    {
        $land = Land::find($id);

        if (!$land) {
            abort(404); 
        }

        $request->validate([
            'address' => 'required',
            'area' => 'required',
            'way' => 'required',
        ]);

        $land->address = $request->address;
        $land->area = $request->area;
        $land->way = $request->way;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $land->image = basename($imagePath);
        }

        $land->save();
    

        if (Auth::guard('farm')->user()->role == 1) {
            return redirect()->route('admin-list')->with('status', '土地情報が更新されました。');
        } else {
            return redirect()->route('mypage')->with('status', '土地情報が更新されました。');
        }
    }

    public function deleteLand($id)
    {
        $land = Land::find($id);

        if (!$land) {
            abort(404); 
        }


        if ($land->reservations()->exists()) {
            return redirect()->back()->with('error', '予約されているため、削除できません。');
        }

    
        $land->del_flg = 1;
        $land->save();

        return redirect()->back()->with('status', '土地情報が削除されました。');
    }
    public function admindeleteLand($id)
    {
        $land = Land::find($id);

        if (!$land) {
            abort(404); 
        }

        // 予約が存在する場合は削除を制限
        if ($land->reservations()->exists()) {
            return redirect()->route('admin-list')->with('error', '予約されているため、削除できません。');
        }

        // del_flg を更新
        $land->del_flg = 1;
        $land->save();

        return redirect()->route('admin-list')->with('status', '予約しました。');
    }
    public function adminList()
    {
        $lands = Land::where('del_flg', 0)->with('reservations.user')->get();

        return view('admin-list')->with('lands', $lands);
    }


}   
