<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\booking;

class HomeController extends Controller
{
    public function room_detail($id){

        $room = Room::find($id);
        return view('home.detail_kamar', compact('room'));
    }

    public function add_booking(Request $request, $id) {

        $request->validate([
            'starDate' =>'required|date',
            'endDate' => 'date|after:starDate',
        ],[
            'starDate.required' => 'Tanggal Mulai Harus Di isi',
            'starDate.date' => 'Tanggal Mulai Harus berupa tanggal yang valid',
            'endDate.date' => 'Tanggal Akhir Harus berupa tanggal yang valid',
            'endDate.after' => 'Tanggal akhir Harus setelah tanggal mulai',

        ]
        );

        $data = new Booking;
        $data->room_id = $id;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->telpon = $request->telpon;
        
        $starDate = $request->starDate;
        $endDate = $request->endDate;
        $isBooked = Booking::where('room_id', $id)->where('start_date', '<=', $endDate)->where('end_date', '>=', $starDate)->exists();
        if($isBooked)
        {
            return redirect()->back()->with('message', 'Kamar sudah dibooking ditanggal tersebut');
        }else{
        $data->start_date = $request->starDate;
        $data->end_date = $request->endDate;
        $data->save();
        return redirect()->back()->with('message', 'Kamar berhasil ditambahkan');
        }
    }
}
