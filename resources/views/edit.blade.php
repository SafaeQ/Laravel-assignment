@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h2>Edit User</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.edit',$user->id) }}" method="POST">
        @csrf
        @method('POST')

         <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <div class="col-md-6">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" >
                </div>
            </div>
            <div class="col-md-6 offset-md-4">
                <div class="col-md-6">
                    <strong>Email:</strong>
                    <input class="form-control" type= "text" name="email" value="{{ $user->email }}" >
                </div>
            </div>
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>password:</strong>
                    <input class="form-control" style="height:150px" name="password" placeholder="Detail">{{ $user->password }}/>
                </div>
            </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection
