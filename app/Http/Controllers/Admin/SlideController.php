<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
   public function getFormSlide()
   {
        return view('admin.slide.add');
   }

   public function postSlide(SlideRequest $request)
   {

        $slide = new Slide();

        $slide->url = $request->url;
        $image                = $request->file('image');
        if(!empty($image)){

                $nameimg              = $image->getClientOriginalName();
                // Directory path upload photos  FOLDER_PHOTOS edit bootstrap constant.php
                $slide->image          = $nameimg;
                $des                  = 'source/image/slide';
                $image->move($des,$nameimg);

            }

        if( $slide->save() ){

             return redirect()->route('admin.list-slide')->with(['flash_lavel'=>'success','flash_message' => '<h4>Bạn đã thêm thành công slide</h4>']);

        } else{

            return redirect()->route('admin.add-slide')->with(['flash_lavel'=>'danger','flash_message' => '</h4>Không thể thêm slide</h4>']);

        }

   }


   public function listSlide()
   {
        $slide = Slide:: select('*')->paginate(5);
       
       

        return view('admin.slide.index',compact('slide'));
   }

   public function deleteSlide($id)
    {
            $slide = Slide::find($id);

            if( empty($slide)) {

                return redirect()->route('admin.list-slide')->with(['flash_lavel'=>'danger','flash_message' => '</h4>Khong ton tai slide</h4>']);
            }

           $slide = Slide::where('id',$id)->delete();

           if( $slide ) {

            return redirect()->route('admin.list-slide')->with(['flash_lavel'=>'success','flash_message' => '<h4>Slide đã được xóa</h4>']);

           } else {

             return redirect()->route('admin.list-slide')->with(['flash_lavel'=>'danger','flash_message' => '<h4>Lỗi Không thể xóa slide</h4>']);
           }
    
    

   }


   public function getEditSlide($id) 
   {

      $slide = Slide::where('id',$id)->first();

        if( empty($slide)) {

            return redirect()->route('admin.list-slide')->with(['flash_lavel'=>'danger','flash_message' => 'Khong ton tai slide']);
        }

      return view('admin.slide.edit',compact('slide'));

   }

   public function getSearch(Request $rq){
    $slide = Slide::where('url','like','%'.$rq->keyword.'%')->orWhere('id',$rq->keyword)->get();
    return view('admin.slide.search',compact('slide'));
   }

   public function postEditSlide($id, SlideRequest $request ) 
   {

       
        $slide = Slide::where('id',$id)->first();
        
        $slide->url = $request->url;
        $image                = $request->file('image');
        if(!empty($image)){

                $nameimg              = $image->getClientOriginalName();
                // Directory path upload photos  FOLDER_PHOTOS edit bootstrap constant.php
                $slide->image          = $nameimg;
                $des                  = 'source/image/slide';
                $image->move($des,$nameimg);

            }
        
        if( $slide->save()  ){

             return redirect()->route('admin.list-slide')->with(['flash_lavel'=>'success','flash_message' => '<h4>Bạn đã chỉnh sửa thành công slide</h4>']);

        } else {

            return redirect()->route('admin.add-slide')->with(['flash_lavel'=>'danger','flash_message' => 'Lỗi không thể Chinh sua slide']);

        }

   }
}
