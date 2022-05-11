@extends('layouts.admin')
@section('title','Edit')

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
                            <form action="{{route('secondpage.update',$second['id'])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title EN</label>
                                        <input type="text" value="{{$second['title_en']}}" name="title_en" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter category name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title AZ</label>
                                        <input type="text" value="{{$second['title_az']}}" name="title_az" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter category name" required>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title RU</label>
                                        <input type="text" value="{{$second['title_ru']}}" name="title_ru" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter category name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title TR</label>
                                        <input type="text" value="{{$second['title_tr']}}" name="title_tr"
                                               class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter category name" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Select Home Page</label>
                                        <select name="home_id" class="form-control">
                                            @foreach($homePage as $home)
                                                <option
                                                    value="{{$home['id']}}"
                                                    @if($home['id'] == $second['home_id'])selected
                                                    @endif>
                                                    {{$home['title_en']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="feature_image">Изображение статьи</label>
                                        <img src="{{ $second['img'] }}" alt="" class="img-uploaded" style="display: block; width: 300px">
                                        <input type="text" value="{{ $second['img'] }}" name="img" class="form-control" id="feature_image"
                                               name="feature_image" value="" readonly>
                                        <button href="" class="popup_selector btn btn-primary m-2" data-inputid="feature_image">Выбрать изображение</button>
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
