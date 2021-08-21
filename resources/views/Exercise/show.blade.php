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
                      
                        </th>
                    </thead>
                        <tr>
                            <td>

                                <b>Due </b>  {{ $exercises->postingTime }}
                                <br>
                                <p> <b>Submisstting </b> file upload</p>
                                <br>
                                <p>Dealine : {{ $exercises->deadlineSubmission }}</p>

                                <b>Đề bài: </b> {{ $exercises->question }}<br>
                            </td>
                        </tr>
                        <tr>
                            <br>
                               
                           
                                
                                {{-- <td>
                                    <div id="source-html">
                                        <p>{{ $exercises->content }}</p>
                                   </div>
                                </td> 
                                <td>
                                    <div class="content-footer">
                                        <button id="btn-export btn btn-danger" onclick="exportHTML();"> Export to word doc </button>
                                    </div>
                            <script>
                                function exportHTML(){
                                    var header= "<html xmlns:o='urn:cchemas-microsoft-com:office:offic'"+
                                                "xmlns:w='urn:schemas-microsoft-com:office:word'"+
                                                "xmlns='http://www.w3.org/TR/REC-html40'>"+
                                                "<head><meta charset='utf-8'><title>Export HTML Word Document with JavaScript</title></head><body>";
                                    var footer = "</body></html>";
                                    var sourceHTML = header+document.getElementById("source-html").innerHTML+footer;

                                    var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
                                    var fileDowload = document.createElement("a");
                                    document.body.appendChild(fileDowload);
                                    fileDowload.href=source;
                                    fileDowload.download = 'document.doc';
                                    fileDowload.click();
                                    document.body.removeChild(fileDowload);
                                }
                            </script>
                                </td> --}}
                                <td>
                                    <form id="form1">
                                        <div id="dvContainer">
                                            <p>{{ $exercises->content }}</p>
                                        </div>
                                        <input type="button" value="tải về" id="btnPrint" />
                                    </form>
                                        <script type="text/javascript">
                                            $("#btnPrint").live("click", function () {
                                                var divContents = $("#dvContainer").html();
                                                var printWindow = window.open('', '', 'height=400,width=800');
                                                printWindow.document.write('<html><head><title>ĐỀ BÀI</title>');
                                                printWindow.document.write('</head><body >');
                                                printWindow.document.write(divContents);
                                                printWindow.document.write('</body></html>');
                                                printWindow.document.close();
                                                printWindow.print();
                                            });
                                        </script>
                                </td>
                               
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
                                            <input type="hidden" name="status" value="1">
                                            <input type="hidden" name="title" value="{{ $exercises->title }}">
                                            <br>
                                            <input type="hidden" name="idExercise" value="{{ $exercises->idExercise }}">
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
                                                <input type="hidden" name="status" value="1">
                                                <input type="hidden" name="title" value="{{ $exercises->title }}">
                                                <input type="hidden" name="idExercise" value="{{ $exercises->idExercise }}">

                                            Ngay nop:  <input type='datetime' id='date' value='<?php echo date('Y-m-d h:m:s');?>' min ="{{ asset($exercises->postingTime) }}"
                                                max="{{ asset($exercises->deadlineSubmission) }}" name="responseTime" readonly><br><br>

                                                <a href="{{ asset($exercises->content) }}" download> Mẫu excel để điền </a>
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

            