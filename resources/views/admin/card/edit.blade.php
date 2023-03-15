@extends('layouts.admin')
@section('title','Edit Cards')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Cards</h1>
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
                            <form action="{{route('card.update',$card->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Category</label>
                                        <input type="text" value="{{$card->category}}" name="category" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter category">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" value="{{$card->title}}" name="title" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Location</label>
                                        <input type="text" value="{{$card->location}}" name="location" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter location">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input type="tel" value="{{'+'.$card->phone}}" name="phone"  class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter phone number">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Fax</label>
                                        <input type="tel" name="tel" value="{{'+' . $card->fax}}" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter fax number" >
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" value="{{$card->email}}" name="email" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter email" >
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Website Link</label>
                                        <input type="text" value="{{$card->link}}" name="link" value="https://" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter website link">
                                    </div>
                                    <div class="form-group">
                                        <label for="feature_image">Select Image</label>
                                        <img src="value="{{$card->img}}"" alt="" class="img-uploaded" style="display: block; width: 300px">
                                        <input type="text"  value="{{$card->img}}" name="img" class="form-control" id="feature_image"
                                               name="feature_image" readonly>
                                        <button href="" class="popup_selector btn btn-primary m-2"
                                                data-inputid="feature_image">Выбрать изображение
                                        </button>
                                    </div>
                                        <div class="form-group col-sm-6">
                                            <label>Select Parent Category</label>
                                            @foreach($thirds as $third)
                                                <div class="form-group form-check">
                                                    <input type="checkbox" value="{{$third->id}}"
                                                           @if($third['id'] == $card['third_id'])checked
                                                           @endif
                                                           name="third_id" class="form-check-input"
                                                           id="exampleCheck{{$third->id}}"
                                                           placeholder="Enter role name">
                                                    <label class="form-check-label"
                                                           for="exampleCheck{{$third->id}}">{{$third->title_en}}</label>
                                                </div>
                                            @endforeach
                                        </div>

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
