@extends('layouts.admin')
@section('title','Add Social Media')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Social Media</h1>
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
                            <form action="{{route('social.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Facebook</label>
                                        <input type="text" name="facebook" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title en name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Instagram</label>
                                        <input type="text" name="instagram" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title en name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Twitter</label>
                                        <input type="text" name="twitter" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title en name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">LinkedIn</label>
                                        <input type="text" name="linkedin" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title en name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">YouTube</label>
                                        <input type="text" name="youtube" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title en name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Whatsapp</label>
                                        <input type="text" name="whatsapp" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title en name" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Telegram</label>
                                        <input type="text" name="telegram" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title en name" required>
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
