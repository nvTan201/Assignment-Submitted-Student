@extends('layout.app')
@section('content')

<div class="content">
    <div class="card">
        
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên file</th>
                <th scope="col">Ngày nộp</th>
                <th>Dowload</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($files as $file)
                <tr>
                  <th scope="row">{{ $file->idExerciseFinish }}</th>
                  <td>{{ $file->exerciseFinish }}</td>
                  <td>{{ $file->responseTime }}</td>
                  <td>
                      <form action=""  method="POST">
                        @csrf
                        <input type="hidden" name="file" >
                            <button class= "btn btn info"> Dowload</button>
                      </form>
                  </td>
                  
                </tr>
              @endforeach
            
             
            </tbody>
          </table>
        <!-- end content-->
    </div>
</div>
@endsection
