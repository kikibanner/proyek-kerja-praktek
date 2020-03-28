<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IpoltController extends Controller
{
    public function index(Request $request)
    {

        if($request->has('cari'))
        {
            $ipolt = \App\Ipolt::where('sto','LIKE','%'.$request->cari.'%')
                                ->orWhere('merk','LIKE','%'.$request->cari.'%')
                                ->orWhere('type','LIKE','%'.$request->cari.'%')
                                ->orWhere('hostname','LIKE','%'.$request->cari.'%')
                                ->orWhere('ip_oam','LIKE','%'.$request->cari.'%')
                                ->orWhere('metro','LIKE','%'.$request->cari.'%')
                                ->orWhere('metro_port_1','LIKE','%'.$request->cari.'%')
                                ->orWhere('metro_port_2','LIKE','%'.$request->cari.'%')
                                ->orWhere('vlan_inet','LIKE','%'.$request->cari.'%')
                                ->orWhere('alamat','LIKE','%'.$request->cari.'%')
                                ->get();
        }else{
            $ipolt = \App\Ipolt::all();
        }

        return view('ipolt.index', ['ipolt' => $ipolt]);
    }

    public function create(Request $request)
    {
        \App\Ipolt::create($request->all());
        return redirect('\ipolt')->with('success','Data Berhasil Diinput!');
    }

    public function edit($id)
    {
        $ipolt = \App\Ipolt::find($id);
        $user = \App\User::find($id);
        return view('ipolt.edit',['ipolt' => $ipolt],['user' => $user]);
    }

    public function update(Request $request,$id)
    {
        $ipolt = \App\Ipolt::find($id);
        $ipolt->update($request->all());
        return redirect('\ipolt')->with('success','Data Berhasil Diperbarui!');
    }

    public function delete($id)
    {
        $ipolt =  \App\Ipolt::find($id);
        $ipolt->delete($ipolt);
        return redirect('\ipolt')->with('success','Data Berhasil Dihapus!');
    }

    public function detail($id)
    {
        $ipolt = \App\Ipolt::find($id);
        $user = \App\User::find($id);
        return view('ipolt.detail',['ipolt' => $ipolt],['user' => $user]);
    }
}
