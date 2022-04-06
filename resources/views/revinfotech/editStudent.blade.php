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
            Edit student Data
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
              <form method="post" action="{{ route('student.update', $student->student_id ) }}" enctype="multipart/form-data">
                  <div class="form-group">
                      @csrf
                      @method('PATCH')
                      <label for="country_name">student Name:</label>
                      <input type="text" class="form-control" name="name" value="{{ $student->name }}"/>
                  </div>
                  <div class="form-group">
                      <label for="cases">Father name :</label>
                      <input type="text" class="form-control" name="father_name" value="{{ $student->father_name }}"/>
                  </div>
                  <div class="form-group">
                      <label for="cases">Phone :</label>
                      <input type="text" class="form-control" name="phone" value="{{ $student->phone }}"/>
                  </div>

                    <div class="form-group">
                        <label for="cases">Class studying </label>                        
                        <select name="class_study" id="class_study" class="form-control">
                            <option value="5"> V</option>
                            <option value="6"> VI</option>
                            <option value="7"> VII</option>
                            <option value="8"> VIII</option>
                        </select>
                    </div>

                  <div class="form-group">
                      <label for="cases">Photo :</label>
                      <input type="file" class="form-control" name="photo"/>
                  </div>                        
                  <button type="submit" class="btn btn-primary">Update</button>
              </form>
          </div>
        </div>
    </div>
</div>
<script>
    $("#class_study").val('{{$student->class_studying}}').attr('selected','selected')
</script>
@endsection