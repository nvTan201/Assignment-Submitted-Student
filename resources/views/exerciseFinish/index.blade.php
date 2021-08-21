@extends('layout.app')
@section('content')

<div class="content">
    <div class="card">
        <h3>Các bài tập đã nộp</h3>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên file/Text</th>
                <th  scope="col">Nội dung</th>
                <th scope="col">Ngày nộp</th>
                
                
              </tr>
            </thead>
            <tbody>
              @foreach($files as $file)
              <tr>
                <th scope="row">{{ $file->idExerciseFinish }}</th>
                <td>{{ $file->title }}</td>
                <td>{{ $file->exerciseFinish }}</td>
                <td>{{ $file->responseTime }}</td>
                
             
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
