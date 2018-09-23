@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-xs-9">
                <div class="col-md-12 text-center">
                    <div style="max-width: 500px" class="center-block">
                        <img src="{{url('uploads/covers/'.$magazine->id.'.jpg')}}" class="img-responsive">
                        <h2>{{$magazine->name}} <small>{{\Carbon\Carbon::parse($magazine->publication_date)->format('F Y')}}</small> </h2>
                        <p class="text-mute" style="text-transform: capitalize">
                            Category: <b>{{\App\Category::find($magazine->category_id)->name}}</b>
                        </p>
                        <p class="text-mute">
                            Language: <b>{{\App\Language::find($magazine->language_id)->name}}</b>
                        </p>
                        @foreach($magazine->links as $link)
                            <a class="btn btn-primary" style="margin-top: 10px" target="_blank" href="{{$link->url}}"> <i class="fa fa-download"></i> Download Magazine</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xs-3">
                <div style="margin-right: 20px">
                   @include('partials.adwords')
                </div>
            </div>
        </div>
        <div class="row">
            <br><br>
            <div class="col-md-12">
                <h2 class="text-white">Maybe you might be interested in:</h2>
            </div>
            @foreach($magazines as $magazine)
                <div class="col-sm-3 magazine-item" style="padding: 20px">
                    <a href="{{url('/show-magazine/'.$magazine->id)}}" class="magazine-open-btn">
                        <img src="{{url('uploads/covers/'.$magazine->id.'.jpg')}}" class="img-responsive">
                        <div class="magazine-data text-center">
                            <span class="magazine-name"><b>{{substr($magazine->name,0,100)}}</b></span>
                            <span class="magazine-edition">{{\Carbon\Carbon::parse($magazine->publication_date)->format('F Y')}}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <br><br><br><br><br>
@endsection