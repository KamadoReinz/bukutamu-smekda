<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TamuModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminTamuController extends Controller
{
    public function list()
    {
        $data['getTamu'] = TamuModel::getTamu();
        $data['header_title'] = 'Data Tamu';
        return view('admin.tamu.list', $data);
    }
}
