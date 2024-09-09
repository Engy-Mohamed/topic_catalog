@extends('admin.layouts.main')

@section('content')
<div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">Unread Messages</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-borderless display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Message</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($unread_messages as $unread_message)
                        <tr>
                            <th scope="row">{{date('j M Y', strtotime($unread_message['created_at']))}}</th>
                            <td><a href="{{route('messages.show',$unread_message['id'])}}" class="text-decoration-none text-dark">{{Str::limit($unread_message['content'],139,'...')}}</a></td>
                            <td>{{$unread_message['sender_name']}}</td>
                            <td class="text-center">
                              <form action="{{route('messages.destroy',$unread_message['id'])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" value="delete" onclick="return confirm('Are you sure?')" class="btn btn-link m-0 p-0">
                                <img src='{{asset("assets/admin/images/trash-can-svgrepo-com.svg")}}'>
                                </button>
                              </form>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">Read Messages</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-borderless display" id="_table2">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Message</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($read_messages as $read_message)
                        <tr>
                            <th scope="row">{{date('j M Y', strtotime($read_message['created_at']))}}</th>
                            <td><a href="{{route('messages.show',$read_message['id'])}}" class="text-decoration-none text-dark">{{Str::limit($read_message['content'],139,'...')}}</a></td>
                            <td>{{$read_message['sender_name']}}</td>
                            <td class="text-center">
                              <form action="{{route('messages.destroy',$read_message['id'])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" value="delete" onclick="return confirm('Are you sure?')" class="btn btn-link m-0 p-0">
                                <img src='{{asset("assets/admin/images/trash-can-svgrepo-com.svg")}}'>
                                </button>
                              </form>
                            </td>
                        </tr>
                    @endforeach   
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection