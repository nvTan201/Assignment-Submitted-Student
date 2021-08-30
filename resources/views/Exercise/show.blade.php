@extends('layout.app')
@section('content')
    
<div class="content">
    <div class="card">
            <div class="card-content">
            
                <div class="">

                    <table class="table">
                        <thead class="text-primary">
                            <th><h3>Chi tiết bài tập</h3></th>
                        <th> 
                            
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Start Assignment</button>
                      
                        </th>
                        </thead>
                        <tr>
                            <td>

                                <b>Ngày đăng : </b>  {{ $exercises->postingTime }}
                                <br>
                                <p> <b>Phương thức nộp bài  : </b> file upload, text entry,...</p>
                                <br>
                                <p>Hạn nộp  : {{ $exercises->deadlineSubmission }}</p>

                                <b>Đề bài  : </b> {{ $exercises->question }}<br>
                            </td>
                        </tr>
                        <tr>
                            <br>
                             <h6 class="card-subtitle mb-2 text-muted"><b> File bài tập :</b></h6>
                                <div class="form-group lable-floating">
                                    <div class="alert col-md-7" dada-notify="container">
                                        <button type="button" class="close" value="Dowload" id="btnPrint">
                                            <a href="{{ asset($exercises->content) }}" id="dvContainer">
                                                <i class="material-icons" style="color: black;size:100px"> get_app</i>
                                            </a>
                                        </button>
                                        <span id="fileFinish"> {{ basename($exercises->content ).PHP_EOL}}</span>
                                    </div>
                                </div>
                                <br>
                            </tr>
                            <tr>
                        </tr>
                </table>


                
            </div>
        </div>

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nộp bài tập</h5>
                </div>
                <div class="modal-body">
               
                            <div class="card">
                               
                                <div class="card-content">
                                    <ul class="nav nav-pills nav-pills-warning">
                                        <li class="active">
                                            <a href="#pill1" data-toggle="tab">File Upload</a>
                                        </li>
                                        <li>
                                            <a href="#pill2" data-toggle="tab">Text Entry</a>
                                        </li>
                                        <li>
                                            <a href="#pill3" data-toggle="tab">Google Doc</a>
                                        </li>
                                        <li>
                                            <a href="#pill4" data-toggle="tab">Photo</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="pill1">
                                         
                                           
                                            <form enctype="multipart/form-data" action="{{ route('file.upload-file') }}" method="POST">
                                                @csrf
                                            {{-- <input type="hidden" name="status" value="1"> --}}
                                            <input type="hidden" name="titleFinish" value="1">
                                            <br>
                                            <input type="hidden" name="idExercise" value="{{ $exercises->idExercise }}">
                                            <br>
                                            <input type="hidden" name="check">

                                            @if ($check =0)
                                            <div class="d-inline p-2 bg-primary text-white">Nộp muộn</div>
                                            @else
                                            <div class="d-inline p-2 bg-dark text-white">Nộp đúng hạn</div>
                                            @endif
                                            <br>
                                             Ngày nộp: <input type='datetime' id='date' value='<?php echo date('Y-m-d h:m:s');?>'name="responseTime" readonly> 
                                             
                                                <script>
                                                    var today = new Date();
                                                    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
                                                    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                                                    var dateTime = date+''+time;
                                                    document.getElementById("date").innerHTML= dateTime;
                                                </script>
                                                <br>
                                               
                                                    <label for="exampleFormControlFile1">Example file input</label>
                                                    
                                                   <input type="file" name="file" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf"/> 
                                                   <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                </form>
                                        </div>
                                        <div class="tab-pane" id="pill2">
                                            <h4>Làm bài tập</h4>
                                            <form action="{{ route('ExerciseFinish.store') }}" method="post">
                                                @csrf
                                                {{-- <input type="hidden" name="status" value="1"> --}}
                                                <input type="hidden" name="titleFinish" value="0">
                                                <input type="hidden" name="idExercise" value="{{ $exercises->idExercise }}">
                                                
                                                @if ($check =1)
                                                <div class="d-inline p-2 bg-primary text-white">Nộp đúng hạn</div>
                                                @else
                                                <div class="d-inline p-2 bg-dark text-white">Nộp bài muộn</div>
                                                @endif
                                                <br>    
                                                     Ngay nop:  <input type='datetime' id='date' value='<?php echo date('Y-m-d h:m:s');?>'
                                                name="responseTime" readonly><br><br>

                                               
                                                <textarea name="text" id="text" cols="100" rows="10"></textarea>
                                                <br>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary ">Nop bai  </button>
                                                <script>
                                                    CKEDITOR.replace( 'text' );
                                                    
                                                </script>
                                                
                                            </form>
                                                   
                                        </div>
                                        <div class="tab-pane" id="pill3">
                                            Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                                            <br />
                                            <br />Dynamically innovate resource-leveling customer service for state of the art customer service.
                                        </div>
                                        <div class="tab-pane" id="pill4">
                                            <!-- images upload form -->
                                            <form method="post" id="uploadForm" enctype="multipart/form-data" action="upload.php">
                                                @csrf
                                                <label>Choose Images</label>
                                                <input type="file" name="images[]" id="images" multiple >
                                                <input type="submit" name="submit" value="UPLOAD"/>
                                            </form>

                                            <!-- display upload status -->
                                            <div id="uploadStatus"></div>

                                            <!-- gallery view of uploaded images --> 
                                            <div class="gallery" id="imagesPreview"></div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
               
            
        </div>
    </div>
</div>
@endsection

            