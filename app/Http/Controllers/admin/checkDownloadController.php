<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\checkDowload;

class checkDownloadController extends Controller
{

    public function checkDownload()
    {
        $datas = checkDowload::paginate(30);
        return view('admin\checkDowload\index', [
            'datas' => $datas,
        ]);

    }
}
