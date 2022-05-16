@extends('layouts.admin')
@section('title','Edit Google Setting')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Google Setting</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                    </div>
                @endif
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <form action="{{route('google.update',$google->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{--<div class="form-group col-sm-12">
                                        <label >Google Analytics Link</label>
                                        <textarea name="analytics_link" class="col-sm-12 textarea1">{{$google->analytics_link}}</textarea>
                                    </div>--}}
                                    <div class="form-group col-sm-12">
                                        <label>Google Analytics Script</label>
                                        <br>
                                        <textarea name="analytics_script" class="col-sm-12 textarea1">{{$google->analytics_script}} </textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Google Search Panel Script</label>
                                        <br>
                                        <textarea name="search_script" class="col-sm-12 textarea1">{{$google->search_script}} </textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label >Google Tag Link</label>
                                        <br>
                                        <textarea name="tag_link" class="col-sm-12 textarea1">{{$google->tag_link}}</textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Google Tag Script Head</label>
                                        <br>
                                        <textarea name="tag_script_head" class="col-sm-12 textarea1">{{$google->tag_script_head}}</textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Google Tag Script Body</label>
                                        <br>
                                        <textarea name="tag_script_body" class="col-sm-12 textarea1">{{$google->tag_script_body}}</textarea>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary ">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('style')
    <style>
        .textarea1{
            height: 200px;
        }
    </style>
@endsection
