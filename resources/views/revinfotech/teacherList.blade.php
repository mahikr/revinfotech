
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
      <div class="col-8">
          <table class="table table-striped">
            <thead>
                <tr>
                  <td>ID</td>
                  <td>Name</td>
                  <td>Father name</td>
                  <td>Phone</td>
                  <td>Class</td>
                  <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($teacher as $list)
                <tr>
                    <td>{{$list->teacher_id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->subject}}</td>
                    <td>{{$list->phone}}</td>
                    <td>{{$list->class_studying}}</td>
                    <td><a href="{{ route('teacher.edit', $teacher->teacher_id)}}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{ route('teacher.show', $teacher->teacher_id)}}" class="btn btn-primary">Detail</a></td>
                    <td>
                        <form action="{{ route('teacher.destroy', $teacher->teacher_id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        {{ $teacher->links('pagination::bootstrap-4') }}
  </div>
<div>	
@endsection