@extends('layouts.admin')

@section('title', 'Add Roles')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Roles</h1>
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
                            <form action="{{route('roles.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Roles Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter roles name" required>
                                    </div>
                                    @foreach($permissions as $permission)
                                        <div class="form-group form-check">
                                            <input type="checkbox" value="{{$permission->id}}"
                                                   name="permissions[]" class="form-check-input"
                                                   id="exampleCheck{{$permission->id}}"
                                                   placeholder="Enter role name">
                                            <label class="form-check-label"
                                                   for="exampleCheck{{$permission->id}}">{{$permission->name}}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.container-fluid -->
    </section>

    </div>

@endsection
