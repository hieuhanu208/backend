<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    public function __construct(){

    }
    //
    //
    public function getFormCategory()
    {


    	return view('admin.category.add');
    }

    public function postCategory(CategoryRequest $request)
    {
    	$category = new Category;
    	$category ->cate_name = $request->cate_name;
    	$category ->cate_slug = $request->slug;

    	if($category->save()) {

    		return redirect()->route('admin.list-category')->with(['flash_lavel'=>'success','flash_message' => '<h4>Thêm danh mục thành công </h4> ']);
    	}else{

    		return redirect()->route('admin.category')->with(['flash_lavel'=>'danger','flash_message' => '<h4>Thêm danh mục thất bại </h4> ']);

    	}

    	

    }

    public function listCategory()
    {
        $categories = Category::all();
    	$category =  Category::select('*')->paginate(2);

    	return view('admin.category.index',compact('category'));
    }


    public function editCategory($id){


    	$category = Category::where('cate_id',$id)->first();

        if( empty($category)) {

            return redirect()->route('admin.list-category')->with(['flash_lavel'=>'danger','flash_message' => '<h4>Không tồn tại danh mục</h4>']);
        }

        

    	return view('admin.category.edit',compact('category'));

    }




    public function postEditCategory ($id, CategoryRequest  $request)
    {
        $category = Category::where('cate_id',$id)->first();

        if( empty($category)) {

            return redirect()->route('admin.edit-category')->session()->with(['flash_lavel'=>'danger','flash_message' => '<h4>Không tồn tại danh mục</h4>']);
        }


        $dataUpdate =  array(
            'cate_name' => $request->cate_name,

            'cate_slug' => $request->slug,
        );

        $category = Category::where('cate_id',$id)->update($dataUpdate);

        if(  $category ) {

            return redirect()->route('admin.list-category')->with(['flash_lavel'=>'success','flash_message' => '<h4>Chỉnh sửa danh mục thành công</h4> ']);
        } else {
            return redirect()->route('admin.list-category')->with(['flash_lavel'=>'danger','flash_message' => '<h4>Không thể chỉnh sửa danh mục</h4>']);
        }

        

    }


    public function deleteCategory ($id){

        $category = Category::where('cate_id',$id)->first();

        if( empty($category)) {

            return redirect()->route('admin.edit-category')->with(['flash_lavel'=>'danger','flash_message' => '<h4>Khong ton tai danh muc</h4>']);
        }

       $category = Category::where('cate_id',$id)->delete();

       if( $category ) {

        return redirect()->route('admin.list-category')->with(['flash_lavel'=>'success','flash_message' => '<h4>Xóa danh mục thành công</h4>']);

       } else {

         return redirect()->route('admin.list-category')->with(['flash_lavel'=>'danger','flash_message' => 'xóa Danh mục thất bại']);
       }
    }
}
