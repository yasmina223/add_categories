@extends('admin.admin_master')
@section('admin')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created_at</th>
        </tr>
    </thead>
    <tbody>
        @php($i=1)
        @foreach ($users as $user )
        <tr>
            <td scope="row">{{$i++}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
        </tr>
        @endforeach



    </tbody>
</table>
@endsection
