@extends('layouts.admin')

@section('title', 'Contact Us Message')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-4">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">

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
                            <h3 class="card-title">Inbox</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="Search Mail">
                                    <div class="input-group-append">
                                        <div class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <div class="float-right">
                                    {{ $contacts->links() }}
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.float-right -->
                            </div>
                            <div class="table-responsive mailbox-messages">
                                @foreach($contacts as $contact)
                                <table class="table table-hover table-striped">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="icheck-primary">
                                                <input type="checkbox" value="" id="check{{$contact->id}}">
                                                <label for="check{{$contact->id}}"></label>
                                            </div>
                                        </td>
                                        <td class="mailbox-name"><a href="{{route('contact.show',$contact->id)}}">{{$contact->name}}</a></td>
                                        <td class="mailbox-subject"><b>{{$contact->subject}}</td>
                                        <td class="mailbox-date">{{$contact->created_at->format('d/m/Y')}}</td>
                                        <td class="project-actions text-right">
                                            @if(auth()->user()->can('delete'))
                                                <form action="{{route('contact.destroy',$contact->id)}}"
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
                                    </tbody>
                                </table>
                            @endforeach
                            <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <div class="float-right">
                                    {{ $contacts->links() }}
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.float-right -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->





    <script>
        $(function () {
            //Enable check and uncheck all functionality
            $('.checkbox-toggle').click(function () {
                var clicks = $(this).data('clicks')
                if (clicks) {
                    //Uncheck all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                    $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
                } else {
                    //Check all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                    $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
                }
                $(this).data('clicks', !clicks)
            })

            //Handle starring for font awesome
            $('.mailbox-star').click(function (e) {
                e.preventDefault()
                //detect type
                var $this = $(this).find('a > i')
                var fa = $this.hasClass('fa')

                //Switch states
                if (fa) {
                    $this.toggleClass('fa-star')
                    $this.toggleClass('fa-star-o')
                }
            })
        })
    </script>
@endsection
