@extends('layouts.admin')
@section('title','Second Page')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">All Post </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-12">
                        <a class="btn btn-dark btn-sm" role="button"
                           href="{{route('setting.create')}}">
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
                        <div class="card">
                            <div class="card-body p-0">
                                <table class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%">
                                            ID
                                        </th>
                                        <th style="width: 25%">
                                            Name
                                        </th>
                                        <th style="width: 25%">
                                            Parent Category
                                        </th>
                                        <th style="width: 40%">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($secondPage as $second)
                                        <tr>
                                            <td>
                                                {{$second->id}}
                                            </td>
                                            <td>
                                                {{$second->title_en}}
                                            </td>
                                            <td>
                                                {{Str::upper($second->home_slug)}}
                                            </td>
                                            <td class="project-actions text-right">
                                                @if(auth()->user()->can('edit'))
                                                    <a class="btn btn-info btn-sm"
                                                       href="{{route('secondpage.edit',$second['id'])}}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>
                                                @endif
                                                @if(auth()->user()->can('delete'))
                                                    <form action="{{route('secondpage.destroy',$second->id)}}"
                                                          method="post"
                                                          style="display:inline-block;">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endif
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

@endsection
