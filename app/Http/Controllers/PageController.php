<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Support\Facades\URL;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $data  = Menu::all();
        return view("index",compact("data"));
    }
    public function admin_product(){
        $data = Menu::all();
        return view("admin_element.product",compact("data"));
    }

    public function admin_product_add(){
        return view("admin_element.add");
    }
    public function admin_product_add_create(Request $request){
            $inputs   = $request->all();
            $time     = strtotime(date('Y-m-d H:i:s'));
            $fileType = $request->img->extension();
            $fileName = $time . '.' . $fileType;
            $request->img->move(public_path('files/products'), $fileName);
            $inputs['img'] = URL::to('/files/products/'.$fileName);

            $data = new Menu();
            $data->fill($inputs);
            $data->save();
            return redirect('/admin/product');
    }

    public function admin_product_edit($id){
        $data = Menu::find($id);
        return view("admin_element.edit",compact("data"));
    }
        public function admin_product_edit_update(Request $request,$menu_id){
            $inputs = $request->all();
        if($request->hasFile('img')){
            $time     = strtotime(date('Y-m-d H:i:s'));
            $fileType = $request->img->extension();
            $fileName = $time . '.' . $fileType;
            $request->img->move(public_path('files/products'), $fileName);
            $inputs['img'] = URL::to('/files/products/'.$fileName);
        }
        $data = Menu::find($menu_id);
            $data->fill($inputs);
            $data->save();
            return redirect('/admin/product');
        }
    public function admin_product_delete($id){
        $data = Menu::find($id);
        $data->delete();
        return redirect('/admin/product');
    }

    // public function addi(){
    //     $d = new User();
    //     $d->email = "admin@gmail.com";
    //     $d->password = bcrypt("admin");
    //     $d->save();
    // }
}
