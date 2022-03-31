<?php

namespace App\Http\Controllers;
use App\Models\ComputerCompany;
use App\Models\News;
use App\Models\User;
use App\Models\Categories_new;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function index(){
        $news = News::all();
        $news->load('category_news','user');
        // dd($news[0]->category_news);
        return view('admin.news.index', compact('news'));
    }
    
    //add
    public function add(){
        $cates = Categories_new::all();
        return view('admin.news.add', compact('cates'));
    }
    public function save_add(Request $request){
        $model = new News();
        if($request->hasFile('image')){
            $imgPath = $request->file('image')->store('public/news');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->image = $imgPath;
        }
        $model->fill($request->all());
        // $model->actor = Auth::
        dd(Auth::check());
        if(Auth::check()){
            $model->actor = Auth::id();
        }else{
            return redirect(route('login'));
        }
        $model->save();
        return redirect(route('news.index'));
    }
    
    //edit
    public function edit(){
        
    }
    public function save_edit(){
        
    }
    
    //delete
    public function remove($id){
        $model=News::find($id);
       
        if(!empty($model->image)){
            $imgPath = str_replace('storage/', 'public/', $model->image);
            Storage::delete($imgPath);
        }
        $model->delete(); 
        return redirect(route('news.index'));
    }
}