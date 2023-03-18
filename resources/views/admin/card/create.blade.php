@extends('layouts.admin')
@section('title','Add Cards')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Cards</h1>
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
                            <form action="{{route('card.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Category</label>
                                        <input type="text" name="category" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter category">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Location</label>
                                        <input type="text" name="location" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter location">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input type="tel" name="phone" value="+994" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter phone number">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Fax</label>
                                        <input type="tel" name="tel" value="+994" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter fax number" >
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter email">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Website Link</label>
                                        <input type="text" name="link" value="https://" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter website link" >
                                    </div>
                                    <div class="form-group">
                                        <label for="feature_image">Select Image</label>
                                        <img src="" alt="" class="img-uploaded" style="display: block; width: 300px">
                                        <input enctype="multipart/form-data" type="text" name="img" class="form-control" id="feature_image"
                                               name="feature_image" value="" readonly>
                                        <button href="" class="popup_selector btn btn-primary m-2"
                                                data-inputid="feature_image">Выбрать изображение
                                        </button>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Select Parent Category</label>
                                        @foreach($thirds as $third)
                                            <div class="form-group form-check">
                                                <input type="checkbox" value="{{$third->id}}"
                                                       name="third_id" class="form-check-input"
                                                       id="exampleCheck{{$third->id}}"
                                                       placeholder="Enter role name">
                                                <label class="form-check-label"
                                                       for="exampleCheck{{$third->id}}">{{$third->title_en}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary ">Create</button>
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
