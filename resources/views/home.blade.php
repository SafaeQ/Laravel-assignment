@extends('layouts.app')

@section('content')
<div class="container " style= "background-color: #ff8f00">
    <div class="container h-100" >

    <div class="row justify-content-center h-100">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        {{ __('Dashboard') }}

                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are normal user!') }}
                </div>
            </div>
            <div class="row" style="margin-top: 5rem;">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>CRUD</h2>
                    </div>
                </div>
            </div>
            @if(Auth::user()->id === $user->superAdmin_id )
            <div class="pull-right">
                <a href="{{ route('user.store')}}" class="btn btn-success"> Add User</a>
            </div>
            @endif
            <table class="table table-striped table-dark table-hover">
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($user as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ ($value->email) }}</td>
                    <td><a href="{{ route('user.edit', $value->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('user.destroy', $value->id)}}" >
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
             </table>
        </div>
    </div>
</div>
</div>
@endsection
