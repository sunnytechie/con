<?php

namespace App\Http\Controllers;

use App\Models\Cycprovince;
use App\Models\Diocese;
use App\Models\Province;
use Illuminate\Http\Request;

class CycprovinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::orderBy('created_at', 'desc')->with('dioceses')->get();
        //dd($provinces);
        $dioceses = Diocese::orderBy('created_at', 'desc')->get();
        
        return view('province.index', compact('provinces', 'dioceses'));
    }

    public function profile() {
        $provinces = Province::orderBy('created_at', 'desc')->with('dioceses')->get();
        //dd($provinces);
        $dioceses = Diocese::orderBy('created_at', 'desc')->get();
        $cycs = Cycprovince::orderBy('created_at', 'desc')->paginate();
        return view('province.profile', compact('cycs', 'provinces', 'dioceses'));
    }

    //Method for diocese dependent selection from province select.
    public function getDiocese(Request $request) {

        $dioceses = Diocese::where('province_id', $request->province_id)->get();

        if (count($dioceses) > 0) {
            return response()->json($dioceses);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Index
        //dd($request->all());
        $province = Province::where('id', $request->province_id)->first();
        $diocese = Diocese::where('id', $request->diocese)->first();

        $cyc = New Cycprovince;
        $cyc->province_name = $province->name;
        $cyc->province_id = $request->province_id;
        $cyc->diocese = $diocese->name;
        $cyc->inagurated = $request->inagurated;
        $cyc->img_url = $request->img_url;
        $cyc->rev_name = $request->rev_name;
        $cyc->rev_title = $request->rev_title;
        $cyc->court = $request->court;
        $cyc->address = $request->address;
        $cyc->po_box = $request->po_box;
        $cyc->tel = $request->tel;
        $cyc->email = $request->email;
        $cyc->email_2 = $request->email_2;
        $cyc->website = $request->website;
        $cyc->synod_name = $request->synod_name;
        $cyc->synod_title = $request->synod_title;
        $cyc->synod_address = $request->synod_address;
        $cyc->synod_email = $request->synod_email;
        $cyc->synod_tel = $request->synod_tel;
        $cyc->save();

        return redirect()->back()->with('success', 'CYC Created successfully.');
    }

    public function profileEdit($profile) {
        $provinces = Province::orderBy('created_at', 'desc')->with('dioceses')->get();
        //dd($provinces);
        $dioceses = Diocese::orderBy('created_at', 'desc')->get();

        $profile = Cycprovince::find($profile);
        $profileID = $profile->id;
        $province_name = $profile->province_name;
        $province_id = $profile->province_id;
        $diocese = $profile->diocese;
        $inagurated = $profile->inagurated;
        $img_url = $profile->img_url;
        $rev_name = $profile->rev_name;
        $rev_title = $profile->rev_title;
        $court = $profile->court;
        $address = $profile->address;
        $po_box = $profile->po_box;
        $tel = $profile->tel;
        $email = $profile->email;
        $email_2 = $profile->email_2;
        $website = $profile->website;
        $synod_name = $profile->synod_name;
        $synod_title = $profile->synod_title;
        $synod_address = $profile->synod_address;
        $synod_email = $profile->synod_email;
        $synod_tel = $profile->synod_tel;

        return view('province.editprofile', compact('provinces', 'profileID', 'dioceses', 'province_name', 'province_id', 'diocese', 'inagurated', 'img_url', 'rev_name', 'rev_title', 'court', 'address', 'po_box', 'tel', 'email', 'email_2', 'website', 'synod_name', 'synod_title', 'synod_address', 'synod_email', 'synod_tel'));
    }

    public function profileUpdate(Request $request, $profile) {
        if ($request->has('province_id')) {
        $province = Province::where('id', $request->province_id)->first();
        }
        if ($request->has('diocese')) {
        $diocese = Diocese::where('id', $request->diocese)->first();
        }
        $profile = Cycprovince::find($profile);
        
        if ($request->has('province_id')) {
            $profile->province_id = $request->province_id;
            $profile->province_name = $province->name;
        }
        if ($request->has('diocese')) {
            $profile->diocese = $diocese->name;
        }
        $profile->inagurated = $request->inagurated;
        $profile->img_url = $request->img_url;
        $profile->rev_name = $request->rev_name;
        $profile->rev_title = $request->rev_title;
        $profile->court = $request->court;
        $profile->address = $request->address;
        $profile->po_box = $request->po_box;
        $profile->tel = $request->tel;
        $profile->email = $request->email;
        $profile->email_2 = $request->email_2;
        $profile->website = $request->website;
        $profile->synod_name = $request->synod_name;
        $profile->synod_title = $request->synod_title;
        $profile->synod_address = $request->synod_address;
        $profile->synod_email = $request->synod_email;
        $profile->synod_tel = $request->synod_tel;
        $profile->save();

        return redirect()->back()->with('success', 'CYC Updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete
        $cyc = Cycprovince::find($id);
        $cyc->delete();

        return redirect()->back()->with('success', 'CYC deleted successfully.');
    }
}
