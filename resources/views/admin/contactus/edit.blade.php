@extends('layouts.admin')
@section('title','Edit Contact')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Contact</h1>
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
                            <form action="{{route('contactus.update',$contactus->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input type="text" value="{{$contactus->address}}" name="address" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter address">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Phone Number 1</label>
                                        <input type="tel" value="{{'+'.$contactus->num1}}" name="num1"  class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter phone number">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Phone Number 2</label>
                                        <input type="tel" value="{{'+'.$contactus->num2}}" name="num2"  class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter phone number">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" value="{{$contactus->email}}" name="email" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter email" >
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
