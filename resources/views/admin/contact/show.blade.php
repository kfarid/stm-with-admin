@extends('layouts.admin')

@section('title', 'Contact Us Message')

@section('content')

    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{route('contact.index')}}" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Folders</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item active">
                                        <a href="{{route('contact.index')}}" class="nav-link">
                                            <i class="fas fa-inbox"></i> Inbox
                                            <span class="badge bg-primary float-right">{{$mail_count}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Read Mail</h3>

                                <div class="card-tools">
                                    <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                                    <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="mailbox-read-info">
                                    <h5>Message Subject: {{$contacts->subject}}</h5>
                                    <h6>From: {{$contacts->email}}
                                        <span class="mailbox-read-time float-right">{{$contacts->created_at}}</span></h6>
                                </div>
                                <!-- /.mailbox-read-info -->
                                <div class="mailbox-controls with-border text-center">
                                    <div class="btn-group">

                                        @if(auth()->user()->can('delete'))
                                            <form action="{{route('contact.destroy',$contacts->id)}}"
                                                  method="post"
                                                  style="display:inline-block;">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-default btn-sm delete-btn" data-container="body" title="Delete">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.mailbox-controls -->
                                <div class="mailbox-read-message">
                                    {{$contacts->message}}
                                </div>
                                <!-- /.mailbox-read-message -->
                            </div>
                            <div class="card-footer">
                                @if(auth()->user()->can('delete'))
                                    <form action="{{route('contact.destroy',$contacts->id)}}"
                                          method="post"
                                          style="display:inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-default delete-btn"><i class="far fa-trash-alt"></i> Delete</button>
                                    </form>
                                @endif
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
