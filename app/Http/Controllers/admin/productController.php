<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\type_product;
use Illuminate\Http\Request;

class productController extends Controller
{
    //

    public function ProductList(Request $request)
    {
        $keyword = $request->keyword;
        $count = Product::withTrashed()->count();

        if ($count == 0) {
            $shows = Product::withTrashed()->paginate(10);
            return view('admin.products.index', ['shows' => $shows]);
        } else {
            $shows = Product::where('IdFB', 'like', "%{$keyword}%")->withTrashed()->paginate(10);
            if ($shows->total() > 0) {
                $count = Product::withTrashed()->count();
                $trackuser = Product::onlyTrashed()->count();
                $activeruser = Product::where('deleted_at', null)->count();
                return view('admin.products.index', ['shows' => $shows, 'index' => $count, 'trackuser' => $trackuser, 'activeruser' => $activeruser]);
            } else {
                return redirect()->route('ProductList')->with('erros', 'khong tim thay ban ghi');
            }
        }
    }
    public function addProduct()
    {
        $shows = Product::withTrashed()->get();
        $category = type_product::all();
        return view('admin.products.add', ['shows' => $shows, 'categories' => $category]);
    }
    public function postProduct(Request $request)
    {
        $inputs = preg_split('/\r\n|\r|\n/', $request->textarea);

        foreach ($inputs as $input) {

            $textarea = explode("|", $input);
            if ($request->action == "type-1") {
                $data = [
                    'IdFB' => $textarea[0],
                    'password' => $textarea[1],
                    'email' => $textarea[2],
                    'passmail' => $textarea[3],
                    'fa' => $textarea[4],
                    'id_type' => $request->id_type,
                ];
            } else {
                $data = [
                    'IdFB' => $textarea[0],
                    'pasword' => $textarea[1],
                    'fa' => $textarea[2],
                    'id_type' => $request->id_type,
                ];
            }

            Product::create($data);
        };

        return redirect()->route('ProductList')->with('success', 'bạn da them danh muc thanh cong');
    }
    public function updateProduct(Request $request, $id)
    {
        $image = "";
        if ($request->image) {
            $image = $request->file('image')->store('images');
        } else {
            $image = Product::find($id)->image;
        }
        Product::where('id', $id)->update(array_merge($request->only('name', 'id_type', 'description', 'Unit_price', 'promotion_price', 'new', 'unit'), ['image' => $image]));
        return redirect()->route('ProductList')->with('success', 'bạn xóa danh mục thanh cong');
    }
    public function updatetemplateProduct($id)
    {
        $shows = Product::find($id);
        $products = type_product::all();
        return view('admin.products.edit', ['shows' => $shows, 'products' => $products]);
    }
    public function deleteProduct($id)
    {
        Product::find($id)->delete();
        return redirect()->route('ProductList')->with('success', 'bạn xóa danh mục thanh cong');
    }
    public function trackProduct()
    {
        $shows = Product::onlyTrashed()->paginate(4);
        $count = Product::withTrashed()->count();
        $trackuser = Product::onlyTrashed()->count();
        $activeruser = Product::where('deleted_at', null)->count();
        return view('admin.products.index', ['shows' => $shows, 'index' => $count, 'trackuser' => $trackuser, 'activeruser' => $activeruser]);
    }
    public function activerProduct()
    {
        $shows = Product::where('deleted_at', null)->paginate(4);
        $count = Product::withTrashed()->count();
        $trackuser = Product::onlyTrashed()->count();
        $activeruser = Product::where('deleted_at', null)->count();
        return view('admin.products.index', ['shows' => $shows, 'index' => $count, 'trackuser' => $trackuser, 'activeruser' => $activeruser]);
    }
    public function restoreProduct($id)
    {
        Product::withTrashed()->find($id)->restore();
        return redirect()->route('ProductList')->with('success', 'ban da khoi phuc thanh cong');
    }
    public function action(Request $request)
    {
        $checklis = $request->checkbox;
        $action = $request->action;
        if ($checklis) {
            if ($action) {
                if ($action == 'disabled') {
                    Product::destroy($checklis);
                    return redirect()->route('ProductList')->with('success', 'ban da xoa thanh cong');
                } elseif ($action == 'restore') {
                    Product::withTrashed()->whereIn('id', $checklis)->restore();
                    return redirect()->route('ProductList')->with('success', 'ban da khoi phuc thanh cong');
                } elseif ($action == 'delete') {
                    Product::withTrashed()->whereIn('id', $checklis)->forceDelete();
                    return redirect()->route('ProductList')->with('success', 'ban da xoa vinh vien');
                } else {
                    return redirect()->route('ProductList')->with('erros', 'ban chua chon tac vu ');
                }
            }
        } else {
            return redirect()->route('ProductList')->with('erros', 'ban chua chon mục tieu ');
        }

    }

}
