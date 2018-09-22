@extends('layouts.app')

@section('content')
    @if(isset($infinite))
        <input type="hidden" id="infinite" value="{{$infinite}}">
    @endif
    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                @if(isset($search))
                    <div class="col-md-12">
                        <h2>Search results from "{{$search}}"</h2>
                    </div>
                @endif
                @if(sizeof($magazines)==0)
                        <div class="col-md-12">
                            <h3 class="text-white">No magazines found</h3>
                        </div>
                @endif
                        <div class="infinite-scroll">
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
                            {{ $magazines->links() }}
                        </div>


            </div>
            <div class="col-xs-3">
                <div style="margin-top: 20px;margin-right: 20px">
                    @include('partials.adwords')
                </div>
            </div>
        </div>
    </div>
@endsection
