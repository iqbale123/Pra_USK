<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUser = User::all();
        return response()->json([
            'data' => $allUser
        ]);
    }

    public function login(Request $request)
    {
        $credentials = [
            'username' => $request['username'],
            'password' => $request['password'],
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json(
                [
                    "message" => "Invalid Credential"
                ]
            );
        }

        if (Auth::user()->verif == 'unverified') {
            return response()->json(
                [
                    'message' => 'Unverified User'
                ]
            );
        }

        $last_login = Carbon::now();

        $user = tap(User::where('id', Auth::user()->id))
            ->update(
                ['terakhir_login' => $last_login]
            )
            ->first();

        return response()->json(
            [
                "data" => $user,
                "token" => auth()->user()->createToken('secret')->plainTextToken, 'token_type'=> 'bearer'
            ]
        );
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logout '
        ]);
    }

    public function register(Request $request)
    {

        // Validating data that user store
        $validator  = Validator::make($request->all(), [
            'nis' => 'required',
            'fullname' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {

            //Rules for error
            $error = $validator->errors();

            return response()->json(

                [
                    "message" => $error
                ]
            );
        } else {
            $kode = User::where('role', 'user')->count();

            $user = User::create(
                [
                    'kode' => 'AA00' . $kode + 1,
                    'nis' => $request->nis,
                    'fullname' => $request->fullname,
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'kelas' => $request->kelas,
                    'alamat' => $request->alamat,
                    'verif' => 'unverified',
                    'role' => 'user',
                    'join_date' => Carbon::now()
                ]
            );
            return response()->json([
                'message' => "Berhasil Register",
                "data" => $user,
            ]);
        }
    }

    //admin
    public function allAdmin()
    {
        $admin = User::where('role','admin')->get();
        return response()->json([
            'data' => $admin
        ]);
    }

    public function tambahAdmin(Request $request)
    {
        $admin = User::where('role','admin')->get();
        $count = count($admin);
        $code = 'AA00' . $count + 1;
        $admin = User::create([
            'kode' => $code,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'admin',
            'verif' => 'verified',
            'join_date' => Carbon::now()
        ]);

        return response()->json([
            'msg' => 'data created',
            'data' => $admin
        ]);


    }

    public function updateAdmin(Request $request , $id)
    {
        $admin = User::where('role' , 'admin')->where('id' , $id);
        $admin->update([
            'fullname' => $request->fullname,
            'username' => $request->username,
        ]);
        return response()->json([
            'msg' => 'success edit data',
            'data' => $admin
        ]);

    }

    public function destroyAdmin($id)
    {
        $admin = User::where('role' , 'admin')->where('id' , $id);
        $admin->delete();
        return response()->json([
            'msg' => 'data deleted',
            'data' => $admin
        ]);
    }

    //anggota
    public function indexAnggota()
    {
        $anggota = User::where('role' , 'user')->get();
        return response()->json([
            'data' => $anggota
        ]);
    }

    public function storeAnggota(Request $request)
    {
        $anggota = User::where('role' , 'user')->get();
        $count = count($anggota);
        $code = $count + 1;
        $anggota = User::create([
            'kode' => $code,
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'role' => 'user',
            'verif' => 'verified',
            'join_date' => Carbon::now()
        ]);

        return response()->json([
            'msg' => 'data created',
            'data' => $anggota
        ]);
    }

    public function updateAnggota(Request $request , $id)
    {
        $anggota = User::where('role' , 'user')->where('id' , $id);
        $anggota->update([
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'verif' => $request->verif_id
        ]);
        return response()->json([
            'msg' => 'success edit data',
            'data' =>$anggota
        ]);

    }

    public function destroyAnggota($id)
    {
        $anggota = User::where('role' , 'user')->where('id' , $id);
        $anggota->delete();
        return response()->json([
            'msg' => 'data deleted',
            'data' =>$anggota
        ]);
    }
}
