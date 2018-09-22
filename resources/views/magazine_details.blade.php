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
                        <a class="btn btn-primary" target="_blank" href="{{url('uploads/pdf/'.$magazine->id.'.pdf')}}"> <i class="fa fa-download"></i> Download Magazine</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-3">
                <div style="margin-right: 20px">
                   @include('partials.adwords')
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br>
@endsection