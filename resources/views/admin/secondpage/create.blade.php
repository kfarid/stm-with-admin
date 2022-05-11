@extends('layouts.admin')
@section('title','Add ')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Home Page</h1>
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
                            <form action="{{route('secondpage.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title EN</label>
                                        <input type="text" name="title_en" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title en name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title AZ</label>
                                        <input type="text" name="title_az" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title az name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title RU</label>
                                        <input type="text" name="title_ru" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title ru name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title TR</label>
                                        <input type="text" name="title_tr" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title tr name" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Select Home Page</label>
                                        <select name="home_id" class="form-control">
                                            @foreach($homePage as $home)
                                                <option value="{{$home['id']}}">{{$home['title_en']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="feature_image">Select Image</label>
                                        <img src="" alt="" class="img-uploaded" style="display: block; width: 300px">
                                        <input type="text" name="img" class="form-control" id="feature_image"
                                               name="feature_image" value="" readonly>
                                        <button href="" class="popup_selector btn btn-primary m-2"
                                                data-inputid="feature_image">Выбрать изображение
                                        </button>
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
