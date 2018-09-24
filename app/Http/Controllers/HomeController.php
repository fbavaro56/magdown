<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Magazine;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\DocBlock\Tags\Link;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user magazine list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($error2 = null)
    {
        if(Auth::user()->rol == 1){
            $magazines = DB::table('magazines')->orderBy('created_at','desc')->paginate(8);
        }else{
            $magazines = DB::table('magazines')->where('user_id','=',Auth::user()->id)->orderBy('created_at','desc')->paginate(8);
        }

        return view('home')
            ->with('magazines',$magazines)->with('infinite',0)->with('errors2',$error2);
    }


    /**
     * @param $magazine_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteMagazine($magazine_id,Request $request){
        $magazine = Magazine::find($magazine_id);
        if($magazine->user_id == Auth::user()->id || Auth::user()->rol == 1){
            Magazine::find($magazine_id)->delete();
            return redirect('my-magazines');
        }else{
            abort(404);
        }
    }


    /**
     *
     * Recibe los datos y archivos de una nueva revista para crearla
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|string
     */
    public function uploadMagazine(Request $request){


        $this->validate($request, [
            'name' => 'required|max:255',
            'publication_date' => 'required',
            'category' => 'required',
            'language' => 'required',
//            'pdf_file' => 'required|mimes:pdf',
            'img_file' => 'required|mimes:jpg,jpeg,png',
            'links.0' => 'required'
        ]);


        //Validating the unique version of the magazine
        $edition = Carbon::parse($request->input('publication_date'))->format('F Y');
        $magazine_exist = 0;
        $magazines = Magazine::where('name','LIKE',$request->input('name'))->get();

        foreach ($magazines as $magazine){
            $magazine->edition = Carbon::parse($magazine->publication_date)->format('F Y');
            if($edition == $magazine->edition){
                $magazine_exist = 1;
            }
        }

        if ($magazine_exist == 1){
            $error2 = ['The magazine all ready exist in MagDown'];
            return $this->index($error2);

        }else{
            //Movemos el archivo devolvemos su vista
            $magazine = new Magazine();
            $magazine->name = $request->input('name');
            $magazine->publication_date = $request->input('publication_date');
            $magazine->user_id = Auth::user()->id;

            $magazine->language_id = $request->input('language');
            $magazine->category_id = $request->input('category');

            $magazine->save();

            $magazine = Magazine::where('user_id','=',Auth::user()->id)->get()->last();


            //En vez de recibir pdf creamos enlaces
            //Chequeamos los 4 enlaces, si existe url lo creamos
            foreach ($request->input('links') as $link) {
                // Creamos el nuevo link relacionado a la revista
                if($link != ""){
                    $new_link = new \App\Link();
                    $new_link->magazine_id = $magazine->id;
                    $new_link->url = $link;
                    $new_link->save();
                }

            }



            //Desactivamos recibir pdf
//            $request->file('pdf_file')->move('uploads/pdf', $magazine->id.'.pdf');

            $img = Image::make($request->file('img_file'));
            $img->fit(500,655);
            $img->save('uploads/covers/'.$magazine->id.'.jpg');

            return redirect('show-magazine/'.$magazine->id);
        }
    }


}
