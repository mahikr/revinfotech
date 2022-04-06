
@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="row justify-content-center">
      <div class='col-5'>
          <div class="card">
              <div class="card-header">
                    <p>{{$teacher->name}}</p>
                    <p>{{$teacher->class_teaching}}</p>
                    
              </div>
          </div>
      </div>
      <div class="col-7">
          <table class="table table-striped">
            <thead>
                <tr>
                  <td>ID</td>
                  <td>Name</td>
                  <td>Subject</td>
                  <td>Phone</td>
                  <td>Class Teaching</td>                  
                </tr>
            </thead>
            <tbody>
                @foreach($data as $list)
                <tr>
                    <td>{{$list->teacher_id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->subject}}</td>
                    <td>{{$list->phone}}</td>
                    <td>{{$list->class_studying}}</td>
                    
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>    
  </div>
<div>	
@endsection