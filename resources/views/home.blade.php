@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


                @if (count($errors2) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors2 as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    Your magazines
                    <button type="button" class="btn btn-heding btn-sm pull-right" data-toggle="modal" data-target="#myModal" style="font-family: 'Istok Web', sans-serif;">
                        <i class="fa fa-upload"></i> UPLOAD MAGAZINE
                    </button>
                </div>
                <!-- Modal -->
                @include('partials.upload_magazine')
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Edition</th>
                                <th>Language</th>
                                <th>Category</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($magazines as $magazine)
                                <tr>
                                    <td width="50px">
                                        <img src="{{url('uploads/covers/'.$magazine->id.'.jpg')}}" class="img-responsive">
                                    </td>
                                    <td>{{$magazine->name}}</td>
                                    <td>{{\Carbon\Carbon::parse($magazine->publication_date)->format('F Y')}}</td>
                                    <td style="text-transform: capitalize">{{\App\Language::find($magazine->language_id)->name}}</td>
                                    <td style="text-transform: capitalize">{{\App\Category::find($magazine->category_id)->name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal_{{$magazine->id}}">
                                            <i class="fa fa-ban"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                @include('partials.delete_modal')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        {{ $magazines->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
