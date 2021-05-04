@extends('layouts.master')


@section('title')
    admin!

@endsection()

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>Update</h4>
                </div>
                <div class="card-body">
                <div class="container">
                    <div class="row">
                    <div class="col-md-7">
                    <form action="/update-form/{{$isFind->id}}" method='post'>
                         {{ csrf_field() }}
                         {{ method_field('PUT') }}                       <div class="from-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value={{$isFind->name}}>
                      </div>
                      <div class="form-group">
                        <label for="name">E-mail</label>
                        <input type="email" class="form-control" name="email" value={{$isFind->email}}>
                      </div>
                      <div class="form-group">
                        <label for="approve"> Accepter
                         <input class="form-control" type="checkbox" name="approve"  {{$isFind->approve ==1 ? 'checked':''}} >
                        </label>
                      </div>
                      <div class="from-group">
                        <label for="role">Role</label>
                        <select name='role' class="nav-link dropdown-toggle">
                            <option value="2">Menbre</option>
                            <option value="1">Admin</option>
                      </select>
                      </div>
                      <button type="submit" href="#" class="btn btn-primary">Update</button>
                      <a href="/all-menbre-role" class="btn btn-danger">cancel</a>
                    </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()

@section('scripts')

@endsection()
