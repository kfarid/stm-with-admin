@extends('layouts.admin')
@section('title','Add Setting')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Setting</h1>
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
                            <form action="{{route('setting.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <label for="description">Description</label>
                                        <input type="text" name="description" class="form-control" id="description"
                                               placeholder="Enter category name">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="keywords">Keyword</label>
                                        <input type="text" name="keywords" class="form-control" id="keywords"
                                               placeholder="Enter category name">
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <label for="logotext">Logo Text</label>
                                        <input type="text" name="logotext" class="form-control" id="logotext"
                                               placeholder="Enter category name">
                                    </div>
                                    <div class="form-group">
                                        <label for="feature_image">Logo</label>
                                        <img src="" alt="" class="img-uploaded" style="display: block; width: 300px">
                                        <input type="text"  name="logo" class="form-control" id="feature_image"
                                               name="feature_image" value="" readonly>
                                        <button href="" class="popup_selector btn btn-primary m-2" data-inputid="feature_image">Выбрать изображение</button>
                                    </div>
                                    <div class="form-group">
                                        <label for="feature_image1">Fav Icon</label>
                                        <img src="" class="img-uploaded" style="display: block; width: 300px">
                                        <input type="text" name="favicon" class="form-control" id="feature_image1"
                                               name="feature_image1" value="" readonly>
                                        <button href="" class="popup_selector btn btn-primary m-2" data-inputid="feature_image1">Выбрать изображение</button>
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

