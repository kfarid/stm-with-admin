@extends('layouts.admin')

@section('title', 'All Roles')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">All User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-12">
                        <a class="btn btn-dark btn-sm" role="button"
                           href="{{route('roles.create')}}">
                            <i class="fas fa-plus">
                            </i>
                            Add
                        </a>
                    </div>
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
                    <section class="col-lg-12">

                        <!-- Default box -->
                        <div class="card card-gray-dark">
                            <div class="card-header">
                                <h3 class="card-title">Home Page List</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%">
                                            ID
                                        </th>
                                        <th style="width: 30%">
                                            Name
                                        </th>
                                        <th style="width: 40%">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $r)
                                        <tr>
                                            <td>
                                                {{$r['id']}}
                                            </td>
                                            <td>
                                                {{$r['name']}}
                                            </td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm"
                                                   href="{{route('roles.edit',$r['id'])}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                <form action="{{ route('roles.destroy', $r['id']) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </section>
                </div>
            </div>
        </section>
    </div>
    <!-- /.container-fluid -->
    </section>

    </div>

@endsection
