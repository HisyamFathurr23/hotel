<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;

class AdminController extends Controller
{
    public function index (){
        if (Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == 'user')
            {
                return view('admin.index');
            }else if ($usertype == 'admin'){
                return view ('admin.index');
            }else {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        $room = Room::all();
        return view ('home.index', compact('room'));
    }

    public function create_kamar()
    {
        return view ('admin.create_kamar');
    }

    public function data_kamar()
    {
        $data = Room::all();
        return view ('admin.data_kamar', compact('data'));
    }

    public function kamar_update($id){
        $data = Room::find($id);
        return view('admin.update_kamar', compact('data'));
    }

    public function tambah_kamar(Request $request){
        $request->validate([
            'gambar' => 'required',
        ]);

        $data = new Room;
        $data -> nama_kamar = $request->kamar;
        $data -> deskripsi = $request->desk;        
        $data -> harga = $request->harga;
        $data -> wifi = $request->wifi;
        $data -> type_kamar = $request->type;
        $gambar=$request->gambar;
        if($gambar)
        {
            $gambarnama=time().'.'.$gambar->getClientOriginalExtension();
            $request->gambar->move('room',$gambarnama);
            $data -> gambar = $gambarnama;
        }
        $data->save();

        return redirect()->back()->with('success','kamar berhasil ditambahkan');
    }

    public function edit_kamar(Request $request, $id){


        $data = Room::find($id);
        $data -> nama_kamar = $request->kamar;
        $data -> deskripsi = $request->desk;        
        $data -> harga = $request->harga;
        $data -> wifi = $request->wifi;
        $data -> type_kamar = $request->type;
        $gambar=$request->gambar;
        if($gambar)
        {
            $gambarnama=time().'.'.$gambar->getClientOriginalExtension();
            $request->gambar->move('room',$gambarnama);
            $data -> gambar = $gambarnama;
        }
        $data->save();

        return redirect('data_kamar')->with('success','kamar berhasil di update');
    }

    public function kamar_delete($id){


        $data = Room::find($id);
        $data->delete();

        return redirect()->back()->with('success','kamar berhasil dihapus');
    }

    public function Booking_kamar()
    {
        $data = booking::all();
        return view ('admin.booking_kamar', compact('data'));
    }

    public function booking_update($id){
        $data = booking::find($id);
        return view('admin.booking_update', compact('data'));
    }

    public function edit_booking(Request $request, $id){


        $data = booking::find($id);
        $data -> nama = $request->nama;
        $data -> email = $request->email;        
        $data -> telpon = $request->telpon;
        $data -> start_date= $request->starDate;
        $data -> end_date = $request->endDate;
    
        $data->save();

        return redirect('booking_kamar')->with('success','booking berhasil di update');
    }

    public function booking_delete($id){


        $data = booking::find($id);
        $data->delete();

        return redirect()->back()->with('success','booking berhasil di hapus berhasil dihapus');
    }
}
