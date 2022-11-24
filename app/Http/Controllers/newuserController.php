<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class newuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display data user annd get data from user table databases
        $user = User::all();
        return view('user.user',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // display form to create data user
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create data using orm and hash password data
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('user');
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
        // get data user and display in edit page
        $user = User::findOrFail($id);
        return view('user.edit',compact('user'));
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
        // get data user and update data using request
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get data from user table using id and delete data
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('user');
    }
    // create function bmi
    public function actbmi(Request $request){
        // get and declarate data from request
        $bmicalc = bmi($request->berat,$request->tinggi/100);
        $bbstatus = status($bmicalc);
        $hobi1 = explode(",",$request->hoby)[0];
        $data = new konsul($request->tahun);
        // make var act to get data from variable
        $act = [
            'nama'=>$request->nama,
            'tinggi'=>$request->tinggi,
            'berat'=>$request->berat,
            'bmi'=>$bmicalc,
            'bmistatus'=>$bbstatus,
            'hobi'=>$hobi1,
            'umur'=>$data->hitungUmur(),
            'statusdewasa'=>$data->statusdewasa()
        ];
        // display result to result page
        return view('result',compact('act'));
    }
    
    
}
// create func status
function status($bmii){
    if ($bmii<18.5) {
        return 'kurus';
    }elseif($bmii<=22.9){
        return 'normal';
    }elseif($bmii<=29.9){
        return 'gemuk';
    }else{
        return 'obesitas';
    }
}
// create function bmi and calculate data
function bmi($berat,$tinggi) {
    return $berat / ($tinggi*$tinggi);
} 
// create parrent class umur
class umur{
    // constructor to get var tahun
    public function __construct($tahun)
    {
        $this->tahun = $tahun;
    }
    // method umur to calculate umur
    public function hitungUmur(){
        return 2022-$this->tahun;
    }
}

// create class konsul and extend to class umur
class konsul extends umur{
    // create method status dewasa with data inheritance from class umur
    public function statusdewasa(){
        if ($this->hitungUmur()>=17) {
            return 'dewasa';
        }else{
            return 'belum dewasa';
        }
    }
}