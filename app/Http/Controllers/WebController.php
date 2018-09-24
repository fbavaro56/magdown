<?php

namespace App\Http\Controllers;

use App\Category;
use App\Language;
use App\Link;
use App\Magazine;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class WebController extends Controller
{
    public static function index(){

        $magazines = DB::table('magazines')->orderBy('created_at','desc')->paginate(20);

        return view('welcome')
            ->with('magazines',$magazines)
            ->with('infinite',1)
            ->with('active','all');
    }


    /**
     * Mostramos revistas del idioma seleccionado
     *
     * @param $language_name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function showLang($language_name){
        $language = Language::where('name','=',$language_name)->get()->last();
        $magazines = DB::table('magazines')->where('language_id','=',$language->id)->paginate(20);

        return view('welcome')
            ->with('magazines',$magazines)
            ->with('infinite',1)
            ->with('active',$language_name);
    }



    /**
     * Mostramos revistas del idioma seleccionado
     *
     * @param $language_name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function showCat($category_name){
        $category = Category::where('name','=',$category_name)->get()->last();
        $magazines = DB::table('magazines')->where('category_id','=',$category->id)->paginate(20);

        return view('welcome')
            ->with('magazines',$magazines)
            ->with('infinite',1)
            ->with('active','category');
    }


    /**
     * Buscamos las revistas que incluyan la busqueda en el titulo
     *
     * @return mixed
     */
    public function searchResults(){
        $search = $_GET['search'];
        $magazines = DB::table('magazines')->where('name','LIKE','%'.$search.'%')->paginate(10000000);

        return view('welcome')
            ->with('magazines',$magazines)
            ->with('infinite',0)
            ->with('search',$search);
    }


    /**
     * Mostramos la revista seleccionada
     *
     * @param $magazine_id
     * @return string
     */
    public static function showMagazine($magazine_id){

        $magazine = Magazine::find($magazine_id);
        $magazine->links = Link::where('magazine_id','=',$magazine_id)->get();

        $magazines = Magazine::where('category_id','=',$magazine->category_id)
            ->where('id','!=',$magazine->id)
            ->take(4)
            ->get();


        return view('magazine_details')->with('magazine',$magazine)->with('magazines',$magazines);
    }
}
