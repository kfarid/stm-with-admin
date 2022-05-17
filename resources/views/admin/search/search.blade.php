@extends('layouts.admin')
@section('title','Search')
@section('content')
    <div class="content-wrapper" style="min-height: 1258.94px;">

        <section class="content-header">
            <div class="container-fluid">
                <h2 class="text-center display-4">Search</h2>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{route('adminsearch')}}" method="GET">
                            <div class="input-group input-group-lg">
                                <input type="search" name="search" class="form-control form-control-lg"
                                       placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if($results->isNotEmpty())
                    @foreach($results as $result)
                        <h2>Homepage</h2>
                        <div class="row mt-3">
                            <div class="col-md-10 offset-md-1">
                                <div class="list-group">
                                    <div class="list-group-item">
                                        <div class="row">
                                            <div class="col px-4">

                                                <h1><a href="{{route('homepage.index')}}"
                                                       class="nav-link item">{{$result->title_en}}</a></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>
                        <div class="row mt-3">
                            <div class="col-md-10 offset-md-1">
                                <div class="list-group">
                                    <div class="list-group-item">
                                        <div class=" d-flex justify-content-center">
                                            <h3><strong> No search result found.</strong></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection
