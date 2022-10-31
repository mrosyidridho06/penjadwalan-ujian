<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index($id = null)
    {
        if(isset($id)){
            $dosen = Dosen::with('user')->findOrFail($id);

            return response()->json([$dosen], 200);
        } else {
            $dosen = Dosen::with('user')->get();
            return response()->json([$dosen], 200);
        }
    }
}
