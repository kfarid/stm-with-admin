@extends('layouts.admin')
@section('title','Add Panels')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Panels</h1>
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
                            <form action="{{route('panel.update',$panel->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Name EN</label>
                                        <input type="text" value="{{$panel->name_en}}" name="name_en" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter name en name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Name AZ</label>
                                        <input type="text" value="{{$panel->name_az}}" name="name_az" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter name en name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Name RU</label>
                                        <input type="text" value="{{$panel->name_ru}}" name="name_ru" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter name ru name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Name TR</label>
                                        <input type="text" value="{{$panel->name_tr}}" name="name_tr" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter name tr name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Text EN</label>
                                        <textarea name="text_en" class="editor">{{$panel->text_en}} </textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Text AZ</label>
                                        <textarea name="text_az" class="editor">{{$panel->text_az}} </textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Text RU</label>
                                        <textarea name="text_ru" class="editor">{{$panel->text_ru}} </textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Text TR</label>
                                        <textarea name="text_tr" class="editor">{{$panel->text_tr}} </textarea>
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
