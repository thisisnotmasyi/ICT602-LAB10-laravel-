<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Snipped Code for CRUD

### Create
```
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Subject</h2>
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

<form action="{{ route('subject.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
                <strong>Subject Code:</strong>
                <input type="text" class="form-control" name="subject_code" placeholder="Subject_Code">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
                <strong>Subject Name:</strong>
                <input type="text" class="form-control" name="subject_name" placeholder="Subject_Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="{{ route('subject.index') }}"> Back</a>
        </div>
    </div>

</form>
@endsection

```

### Read / show
```
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Subjects Details</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Subject Code:</strong>
            {{ $subject->subject_code }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Subject Name:</strong>
            {{ $subject->subject_name }}
        </div>
    </div>
    <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('subject.index') }}"> Back</a>
    </div>
</div>

@endsection
```

### Edit
```
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Subjects</h2>
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

<form action="{{ route('subject.update',$subject->id) }}" method="POST">
    @csrf
    @method('PUT')

     <div class="row">
        <input type="hidden" name="id" value="{{ $subject->id }}"><br/>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subject Code:</strong>
                <input type="text" name="subject_code" value="{{ $subject->subject_code }}" class="form-control" placeholder="Subject_Code">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subject Name:</strong>
                <input type="text" class="form-control" name="subject_name" value="{{ $subject->subject_name }}" placeholder="Subject_Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="{{ route('subject.index') }}"> Back</a>
        </div>
    </div>

</form>
@endsection
```

### Delete
```
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Subjects</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('subject.create') }}"> Add New Subject</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Subject Code</th>
        <th>Subject Name</th>
        {{-- <th>Joined On</th> --}}
        <th width="280px">Action</th>
    </tr>
    @foreach ($subject as $s)
    <tr>
        <td>{{ $s->id }}</td>
        <td>{{ $s->subject_code }}</td>
        <td>{{ $s->subject_name }}</td>
        {{-- <td>{{ $s->created_at }}</td> --}}
        <td>
            <form action="{{ route('subject.destroy',$s->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('subject.show',$s->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('subject.edit',$s->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
```
