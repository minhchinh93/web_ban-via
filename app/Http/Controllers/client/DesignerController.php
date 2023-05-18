<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\checkDowload;
use App\Models\mocupProduct;
use App\Models\Product;
use App\Models\ProductPngDetails;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use ZipArchive;

class DesignerController extends Controller
{
    //
    public function Dashboard(Request $request)
    {
        $keyword = $request->keyword;

        if ($keyword != "") {

            $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->Where('title', 'like', "%{$keyword}%")->paginate(7);
            $report->appends(['keyword' => $keyword]);
        } else {
            $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->paginate(10);
        }

        $totalPending = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->count();
        $totalDone = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->count();
        $totalNotSeen = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->count();
        $totalPendingDS = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 3)->count();

        if ($report->total() > 0) {
            foreach ($report as $rep) {
                $userIdeas[] = User::where('id', $rep->id_idea)->get();
            }
            foreach ($userIdeas as $userIdea) {
                $name[] = $userIdea;
            }
        } else {
            $name = "";
        }
        // dd($name[1][0]->name);
        return view(
            'client.dasboa.index',
            ['reports' => $report,
                'totalPending' => $totalPending,
                'totalDone' => $totalDone,
                'totalNotSeen' => $totalNotSeen,
                'totalprioritize' => $totalNotReceived,
                'totalPendingDS' => $totalPendingDS,
                'name' => $name,
            ]
        );
    }
    public function complete(Request $request)
    {
        $keyword = $request->keyword;
        if ($keyword != "") {
            $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->Where('title', 'like', "%{$keyword}%")->where('status', 5)->paginate(7);
            $report->appends(['keyword' => $keyword]);
        } else {
            $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->paginate(10);
        }
        $designer = User::get()->where('role', 1);
        $totalDone = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->count();
        $totalNotSeen = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->count();
        $totalPendingDS = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 3)->count();
        if ($report->total() > 0) {
            foreach ($report as $rep) {
                $userIdeas[] = User::where('id', $rep->id_idea)->get();
            }
            foreach ($userIdeas as $userIdea) {
                $name[] = $userIdea;
            }
        } else {
            $name = "";
        }
        return view(
            'client.dasboa.index',
            ['designers' => $designer,
                'reports' => $report,
                'totalPending' => $totalPending,
                'totalDone' => $totalDone,
                'totalNotSeen' => $totalNotSeen,
                'totalprioritize' => $totalNotReceived,
                'totalPendingDS' => $totalPendingDS,
                'name' => $name,
            ]
        );
    }
    public function replay(Request $request)
    {
        $keyword = $request->keyword;
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->Where('title', 'like', "%{$keyword}%")->where('status', 4)->paginate(7);
        $totalDone = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->count();
        $totalNotSeen = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->count();
        $totalPendingDS = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 3)->count();
        if ($report->total() > 0) {
            foreach ($report as $rep) {
                $userIdeas[] = User::where('id', $rep->id_idea)->get();
            }
            foreach ($userIdeas as $userIdea) {
                $name[] = $userIdea;
            }
        } else {
            $name = "";
        }
        return view(
            'client.dasboa.index',
            ['designers' => $designer,
                'reports' => $report,
                'totalPending' => $totalPending,
                'totalDone' => $totalDone,
                'totalNotSeen' => $totalNotSeen,
                'totalprioritize' => $totalNotReceived,
                'totalPendingDS' => $totalPendingDS,
                'name' => $name,

            ]
        );
    }
    public function NotSeen(Request $request)
    {
        $keyword = $request->keyword;
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->Where('title', 'like', "%{$keyword}%")->where('status', 1)->paginate(7);
        $totalDone = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->count();
        $totalNotSeen = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->count();
        $totalPendingDS = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 3)->count();
        if ($report->total() > 0) {
            foreach ($report as $rep) {
                $userIdeas[] = User::where('id', $rep->id_idea)->get();
            }
            foreach ($userIdeas as $userIdea) {
                $name[] = $userIdea;
            }
        } else {
            $name = "";
        }
        return view(
            'client.dasboa.index',
            ['designers' => $designer,
                'reports' => $report,
                'totalPending' => $totalPending,
                'totalDone' => $totalDone,
                'totalNotSeen' => $totalNotSeen,
                'totalprioritize' => $totalNotReceived,
                'totalPendingDS' => $totalPendingDS,
                'name' => $name,
            ]
        );
    }
    public function prioritize(Request $request)
    {
        $keyword = $request->keyword;
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->Where('title', 'like', "%{$keyword}%")->where('action', 2)->where('status', '<>', 5)->paginate(7);
        $totalDone = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->count();
        $totalNotSeen = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->count();
        $totalPendingDS = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 3)->count();
        if ($report->total() > 0) {
            foreach ($report as $rep) {
                $userIdeas[] = User::where('id', $rep->id_idea)->get();
            }
            foreach ($userIdeas as $userIdea) {
                $name[] = $userIdea;
            }
        } else {
            $name = "";
        }
        return view(
            'client.dasboa.index',
            ['designers' => $designer,
                'reports' => $report,
                'totalPending' => $totalPending,
                'totalDone' => $totalDone,
                'totalNotSeen' => $totalNotSeen,
                'totalprioritize' => $totalNotReceived,
                'totalPendingDS' => $totalPendingDS,
                'name' => $name,
            ]
        );
    }
    public function PendingDS(Request $request)
    {
        $keyword = $request->keyword;
        $designer = User::get()->where('role', 1);
        $report = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->Where('title', 'like', "%{$keyword}%")->where('status', 3)->paginate(7);
        $totalDone = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 5)->count();
        $totalPending = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 4)->count();
        $totalNotSeen = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 1)->count();
        $totalNotReceived = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('action', 2)->where('status', '<>', 5)->count();
        $totalPendingDS = Product::orderBy('id', 'desc')->where('User_id', Auth::user()->id)->where('status', 3)->count();
        if ($report->total() > 0) {
            foreach ($report as $rep) {
                $userIdeas[] = User::where('id', $rep->id_idea)->get();
            }
            foreach ($userIdeas as $userIdea) {
                $name[] = $userIdea;
            }
        } else {
            $name = "";
        }
        return view(
            'client.dasboa.index',
            ['designers' => $designer,
                'reports' => $report,
                'totalPending' => $totalPending,
                'totalDone' => $totalDone,
                'totalNotSeen' => $totalNotSeen,
                'totalprioritize' => $totalNotReceived,
                'totalPendingDS' => $totalPendingDS,
                'name' => $name,
            ]
        );
    }
    public function Detail($id)
    {

        $ids = Product::find($id);
        return view('client.dasboa.Detail', ['id' => $ids]);
    }

    public function accept($id)
    {
        Product::where('id', $id)->update(['status' => 2]);
        $image = Product::find($id);
        return redirect()->back();
    }
    public function componentDesigner(Request $request, $id)
    {
        $approval = $request->comment;
        $ids = Product::find($id);
        $description = $ids->description;
        $name = $ids->user->name;
        Product::find($id)->update(['description' => $description . "</br> <b style= 'color:blue'>" . $name . "</b>:" . $approval,
        ]);
        return redirect()->back();
    }
    public function addmocups(Request $request, $id)
    {
        $file = $request->file('image');

        foreach ($request->file('image') as $image) {
            $str = $image->getClientOriginalName();
            $filename = str_replace(' ', '-', $str);
            $dataImage = [
                'product_id' => $id,
                'mocup' => $image->storeAs('images', time() . $filename),
            ];
            mocupProduct::where('id', $id)->create($dataImage);
        }
        Product::where('id', $id)->update(['status' => 3]);
        return redirect()->route('PendingDS');
    }
    public function dasboa()
    {
        return view('client.idea.index');
    }

    public function dowloadURL($id)
    {
        $datapngs = ProductPngDetails::where('id', $id)->get();
        $admin = auth()->user()->id;
        if ($admin != 1) {
            $datadowload = [
                'User_id' => auth::user()->id,
                'statusAbsolute' => "tải 1 ảnh PNG",
            ];
            checkDowload::create($datadowload);
        }
        foreach ($datapngs as $datapng) {
            $image = $datapng->ImagePngDetail;
            $filename = str_replace('images/', '', $image);
            if (Storage::exists($image)) {
                $UrlImage = 'https://hblmedia.s3.ap-southeast-1.amazonaws.com/' . $image;
            } else {
                $UrlImage = asset('/storage/' . $image);

            }
            $tempImage = tempnam(sys_get_temp_dir(), $filename);
            copy($UrlImage, $tempImage);
            return response()->download($tempImage, $filename);
        }

    }
    public function dowloadMocupURL($id)
    {
        $datapngs = mocupProduct::where('id', $id)->get();
        $datadowload = [
            'User_id' => auth::user()->id,
            'statusAbsolute' => "tải 1 ảnh Mockup",
        ];
        checkDowload::create($datadowload);
        foreach ($datapngs as $datapng) {
            $image = $datapng->mocup;
            $filename = str_replace('images/', '', $image);
            if (Storage::exists($image)) {
                $UrlImage = 'https://hblmedia.s3.ap-southeast-1.amazonaws.com/' . $image;
            } else {
                $UrlImage = asset('/storage/' . $image);

            }
            $tempImage = tempnam(sys_get_temp_dir(), $filename);

            copy($UrlImage, $tempImage);
            return (response()->download($tempImage, $filename));
        }

    }

    public function dowloadMocupAll($id)
    {
        $datapngs = mocupProduct::where('product_id', $id)->get();
        $datadowload = [
            'User_id' => auth::user()->id,
            'statusAbsolute' => "tải file Mockup",
        ];
        checkDowload::create($datadowload);
        $fileZipName = time() . 'dowloadMockupAll.zip';

        // Mảng URL của các ảnh trên S3
        $s3ImageUrls = [];
        foreach ($datapngs as $i => $value) {
            $s3ImageUrls[] = ('https://hblmedia.s3.ap-southeast-1.amazonaws.com/images/' . basename($value->mocup));
        }

        // Tạo thư mục tạm để chứa các ảnh đã tải xuống
        $tempFolder = storage_path('app/temp');
        if (!File::exists($tempFolder)) {
            File::makeDirectory($tempFolder);
        }

        // Tải xuống và lưu trữ các ảnh tạm thời
        $downloadedImages = [];
        foreach ($s3ImageUrls as $url) {
            $fileName = basename($url);
            $tempFilePath = $tempFolder . '/' . $fileName;
            file_put_contents($tempFilePath, file_get_contents($url));
            $downloadedImages[] = $tempFilePath;
        }

        // Tạo tệp zip
        $zipFilePath = storage_path('app/temp/'.$fileZipName.'.zip');
        $zip = new ZipArchive();
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($downloadedImages as $imagePath) {
                $fileName = basename($imagePath);
                $zip->addFile($imagePath, $fileName);
            }
            $zip->close();
        }

        // Xóa các ảnh tạm sau khi đã nén vào tệp zip
        foreach ($downloadedImages as $imagePath) {
            File::delete($imagePath);
        }

        // Trả về liên kết tải xuống tệp zip
        return response()->download($zipFilePath)->deleteFileAfterSend(true);

    }
    public function dowloadPNGAll($id)
    {
        $datapngs = ProductPngDetails::where('product_id', $id)->get();
        $datadowload = [
            'User_id' => auth::user()->id,
            'statusAbsolute' => "tải file PNG",
        ];
        checkDowload::create($datadowload);
        $fileName = time() . 'ProductPngDetails.zip';

        $zip = new ZipArchive;

        if ($zip->open($fileName, ZipArchive::CREATE) === true) {
            $files = [];
            foreach ($datapngs as $i => $value) {
                $files[$i] = ('https://hblmedia.s3.ap-southeast-1.amazonaws.com/' . basename($value->ImagePngDetail));
            }
            foreach ($files as $file) {
                $relativeNameInZipFile = basename($file);
                $zip->addFile($file, $relativeNameInZipFile);
            }
            $zip->close();
        }
        return response()->download($fileName);
    }
}
