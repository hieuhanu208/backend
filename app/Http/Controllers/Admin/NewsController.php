<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\News;
use App\User;
use File;

class NewsController extends Controller
{


    public function getFormNews()
    {
        $user =  User::select('*')->get();

        return view('admin.news.add',compact('user'));
    }

    public function postNews(NewsRequest $request)
    {

        $news                    = new News();

        $news->content           = $request->content;
        $news->email             = $request->email;
        $news->short_description = $request->short_description;
        $news->user_id           = $request->user_id;
        $news->header            = $request->header;

        $news_img                = $request->file('news_img');
        if(!empty($news_img)){

            $nameimg        = $news_img->getClientOriginalName();
            // Directory path upload photos  FOLDER_PHOTOS edit bootstrap constant.php
            $news->news_img = $nameimg;
            $des            = 'source/image/news';
            $news_img->move($des,$nameimg);

        }

        if( $news ->save() )
        {
            return redirect()->route('admin.list-news')->with(['flash_lavel'=>'success','flash_message' => '<h4>Thêm tin tức thành công</h4>']);
        }


    }

    public function listNews() {

        $news = News::select('*')->paginate(3);
        foreach($news as $listNews)
        {

            $user = User::select('name')->where('id',$listNews->id)->first();

        }
        return view('admin.news.index',compact('news'));

    }

    public function getFormEditNews($id)
    {
        $news = News::where('news_id',$id)->first();


        if( empty($news)) {

            return redirect()->route('admin.list-news')->with(['flash_lavel'=>'danger','flash_message' => '</h4>Không tồn tại tin tức</h4>']);
        }

        $user =  User::select('*')->get();
        return view('admin.news.edit',compact('news','user'));
    }

    public function postEditNews($id,NewsRequest $request)
    {
        $news = News::where('news_id',$id)->first();


        if( empty($news)) {

            return redirect()->route('admin.list-news')->with(['flash_lavel'=>'danger','flash_message' => '</h4>Không tồn tại tin tức</h4>']);
        }


        $news                    = News::find($id);

        $news->header            = $request->header;
        $news->short_description = $request->short_description;
        $news->content           = $request->content;
        $news->email             = $request->email;
        $news->user_id           = $request->user_id;

        $news_img                      = $request->file('news_img');
        if(!empty($news_img)){

            $nameimg              = $news_img->getClientOriginalName();
            // Directory path upload photos  FOLDER_PHOTOS edit bootstrap constant.php
            $news->news_img          = $nameimg;
            $des                  = 'source/image/news';
            $news_img->move($des,$nameimg);

        }


        if( $news->save() ) {



            return redirect()->route('admin.list-news')->with(['flash_lavel'=>'success','flash_message' => '<h4>Chỉnh sửa thành công tin tức </h4> ']);
        }

    }

    public function deleteNews($id)
    {


        $news = News::where('news_id',$id)->first();

        if( empty($news)) {

            return redirect()->route('admin.list-news')->with(['flash_lavel'=>'danger','flash_message' => '<h4>Không tồn tại tin tức</h4> ']);
        }

        $news = News::where('news_id',$id)->delete();

        if( $news ) {

            return redirect()->route('admin.list-news')->with(['flash_lavel'=>'success','flash_message' => '<h4>Tin tức được xóa thành công</h4>']);

        } else {

            return redirect()->route('admin.list-news')->with(['flash_lavel'=>'danger','flash_message' => '<h4>Không thể xóa được tin tức</h4>']);
        }

    }

}
