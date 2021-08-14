@extends('layout.app')
@section('content')
    
<div class="content">
    <div class="card">
            <div class="card-content">
            
                <div class="">

                    <table class="table">
                        <thead class="text-primary">
                            <th><h3>Relation View</h3></th>
                        <th> 
                            
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Start Assignment</button>
                      
  
  
                        </div>
                                
                            
                        </th>
                        
                    </thead>

                        <tr>
                          
                            <td>
                                {{ $exercises->question }}<br>
                                <b>Due </b>  {{ $exercises->postingTime }}
                                <br>
                                {{ $exercises->content }}
                                <br>
                                <p> <b>Submisstting </b> file upload</p>

                              
                            </td>
                            
                            </tr>
                            <tr>

                        </tr>
                  
                    
                </table>
                <textarea name="tamxd" id="tamxd" cols="30" rows="10"></textarea>
                            <script>
                                CKEDITOR.replace( 'tamxd' );
                            </script>
            </div>
        </div>

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="{{ route('file.upload-file') }}" method="POST">
                @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nộp bài tập</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idExercise" value="{{ $exercises->idExercise }}">
                    <input type="text" class="datetimepicker" value="" id="responseTime" name="responseTime"/>
                        <script>
                            var today = new Date();
                            var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
                            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                            var dateTime = date+'. '+time;
                            document.getElementById('#responseTime').value(dateTime);
                        </script>
                        <br>
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input type="file" name="file" id="exampleFormControlFile1">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

            