<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card uper">
            <div class="card-header">
                Add teacher
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                @if(session()->get('Response'))
                    <div class="alert alert-success">
                    {{ session()->get('msg') }}  
                    </div><br />
                @endif
                <form method="post" action="{{ route('teacher.store') }}" enctype="multipart/form-data">
                    <div class="form-group">
                        @csrf
                        <label for="country_name">Name:</label>
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <div class="form-group">
                        <label for="cases">Subject :</label>
                        <input type="text" class="form-control" name="subject"/>
                    </div>
                    <div class="form-group">
                        <label for="cases">Phone :</label>
                        <input type="text" class="form-control" name="phone"/>
                    </div>
                    <div class="form-group">
                        <label for="cases"> Class teaching </label>                        
                        <select name="class_teaching" id="class_teaching" class="form-control">
                            <option value="5"> V</option>
                            <option value="6"> VI</option>
                            <option value="7"> VII</option>
                            <option value="8"> VIII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cases">School name :</label>
                        <input type="text" class="form-control" name="school"/>
                    </div>
                    <div class="form-group">
                        <label for="cases">photo :</label>
                        <input type="file" class="form-control" name="photo"/>
                    </div>                    
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection