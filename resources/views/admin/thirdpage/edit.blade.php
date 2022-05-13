@extends('layouts.admin')
@section('title','Add ')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Third Page</h1>
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
                            <form action="{{route('thirdpage.store',$third->id)}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title EN</label>
                                        <input type="text" value="{{$third->title_en}}" name="title_en" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title en name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title AZ</label>
                                        <input type="text" value="{{$third->title_az}}" name="title_az" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title az name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title RU</label>
                                        <input type="text" value="{{$third->title_ru}}" name="title_ru" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title ru name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title TR</label>
                                        <input type="text" value="{{$third->title_tr}}" name="title_tr" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title tr name" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Select Second Page</label>
                                        <select name="second_id" class="form-control">
                                            @foreach($second as $page)
                                                <option
                                                    value="{{$page['id']}}"
                                                    @if($page['id'] == $third['home_id'])selected
                                                    @endif>
                                                    {{$page['title_en']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Select Panel</label>
                                        @foreach($panels as $panel)
                                            <div class="form-group form-check">
                                                <input type="checkbox" value="{{$panel->id}}"
                                                       name="panels[]" class="form-check-input"
                                                       id="exampleCheck{{$panel->id}}"
                                                       placeholder="Enter role name">
                                                <label class="form-check-label"
                                                       for="exampleCheck{{$panel->id}}">{{$panel->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Select Card</label>
                                        @foreach($cards as $card)
                                            <div class="form-group form-check">
                                                <input type="checkbox" value="{{$card->id}}"
                                                       name="cards[]" class="form-check-input"
                                                       id="exampleCheck{{$card->id}}"
                                                       placeholder="Enter role name">
                                                <label class="form-check-label"
                                                       for="exampleCheck{{$card->id}}">{{$card->title}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Text EN</label>
                                        <textarea value="{{$third->textarea_en}}}" name="textarea_en" class="editor"> </textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Text AZ</label>
                                        <textarea value="{{$third->textarea_az}}}" name="textarea_az" class="editor"> </textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Text RU</label>
                                        <textarea value="{{$third->textarea_ru}}}" name="textarea_ru" class="editor"> </textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Text TR</label>
                                        <textarea value="{{$third->textarea_tr}}}" name="textarea_tr" class="editor"> </textarea>
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
