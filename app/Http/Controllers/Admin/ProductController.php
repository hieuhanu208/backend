<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Products;
use App\Category;
use File;

class ProductController extends Controller
{
    //
    public function getFormProduct()
    {


        $category =  Category::select('*')->get();
    	return view('admin.product.add',compact('category'));
    }

    public function postProduct(ProductRequest $request)
    {

    	$product                    = new Products();
        
        $product->name              = $request->name;
        $product->cate_id           = $request->cate_id;
        $product->description       = $request->description;
        $product->unit_price        = $request->unit_price;
        $product->promotion_price   = $request->promotion_price;
        $product->new               = $request->new;
       
        $product->top_product       = $request->top_product;
        $image                      = $request->file('image');
        if(!empty($image))
        {

                $nameimg              = $image->getClientOriginalName();
                // Directory path upload photos  FOLDER_PHOTOS edit bootstrap constant.php
                $product->image          = $nameimg;
                $des                  = 'source/image/product';
                $image->move($des,$nameimg);

        }

        if( $product ->save() )
        {
         	return redirect()->route('admin.list-product')->with(['flash_lavel'=>'success','flash_message' => '<h4>Thêm sản phẩm thành công</h4>']);
		}
        

    }

    public function listProduct() {

    	$product = Products::select('*')->paginate(2);
        foreach($product as $listProduct)
        {

            $category = Category::select('cate_name')->where('cate_id',$listProduct->cate_id)->first();
            if(!empty($category)){
                $listProduct['namecate'] = $category->cate_name;
            }else{
                
            }
           
        }

       

    	return view('admin.product.index',compact('product'));
    }

    public function getFormEditProduct($id)
    {
    	$product = Products::where('id',$id)->first();

    	if( empty($product)) {

            return redirect()->route('admin.list-product')->with(['flash_lavel'=>'danger','flash_message' => '</h4>Không tồn tại sản phẩm</h4>']);
        }

        $category =  Category::select('*')->get();
    	return view('admin.product.edit',compact('product','category'));
    }

    public function postEditProduct($id,ProductRequest $request)
    {
        $product = Products::where('id',$id)->first();

        if( empty($product)) {

            return redirect()->route('admin.list-product')->with(['flash_lavel'=>'danger','flash_message' => '</h4>Không tồn tại sản phẩm</h4>']);
        }


        $product                    = Products::find($id);
        
        $product->name              = $request->name;
        $product->cate_id           = $request->cate_id;
        $product->description       = $request->description;
        $product->unit_price        = $request->unit_price;
        $product->promotion_price   = $request->promotion_price;
        $product->new               = $request->new;
        
        $product->top_product       = $request->top_product;
        $image                      = $request->file('image');
        if(!empty($image)){

                $nameimg              = $image->getClientOriginalName();
                // Directory path upload photos  FOLDER_PHOTOS edit bootstrap constant.php
                $product->image          = $nameimg;
                $des                  = 'source/image/product';
                $image->move($des,$nameimg);

            }
        
       
        if( $product->save() ) {

            
        
            return redirect()->route('admin.list-product')->with(['flash_lavel'=>'success','flash_message' => '<h4>Chỉnh sửa thành công sản phẩm </h4> ']);
        } else {

            return redirect()->route('admin.add-product')->with(['flash_lavel'=>'danger','flash_message' => '<h4>Lỗi không thể chỉnh sửa sản phẩm</h4>']);
        }

    }


    public function deleteProduct($id)
    {


    	$products = Products::where('id',$id)->first();

        if( empty($products)) {

            return redirect()->route('admin.list-product')->with(['flash_lavel'=>'danger','flash_message' => '<h4>Không tồn tại danh mục</h4> ']);
        }

       $products = Products::where('id',$id)->delete();

       if( $products ) {

        return redirect()->route('admin.list-product')->with(['flash_lavel'=>'success','flash_message' => '<h4>Sản phẩm được xóa thành công</h4>']);

       } else {

         return redirect()->route('admin.list-category')->with(['flash_lavel'=>'danger','flash_message' => '<h4>Không thể xóa được sản phẩm</h4>']);
     }
    
    }
}
