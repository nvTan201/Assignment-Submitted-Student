@extends('layout.app')
@section('content')
    
<div class="content">
   
 
  <div class="container mt-5" style="max-width: 700px">
    <h2 class="h2 text-center mb-5 border-bottom pb-3">Laravel FullCalender CRUD Events Example</h2>
    <div id='full_calendar_events'></div>
  </div>

    @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
      $(document).ready(function () {

          var SITEURL = "{{ url('/') }}";

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          var calendar = $('#full_calendar_events').fullCalendar({
              editable: true,
              editable: true,
              events: SITEURL + "/calendar-event",
              displayEventTime: true,
              eventRender: function (event, element, view) {
                  if (event.allDay === 'true') {
                      event.allDay = true;
                  } else {
                      event.allDay = false;
                  }
              },
              selectable: true,
              selectHelper: true,
              select: function (postingTime, deadlineSubmission, allDay) {
                  var question = prompt('Event Name:');
                  if (question) {
                      var postingTime = $.fullCalendar.formatDate(event_start, "Y-MM-DD HH:mm:ss");
                      var deadlineSubmission = $.fullCalendar.formatDate(event_end, "Y-MM-DD HH:mm:ss");
                      $.ajax({
                          url: SITEURL + "/calendar-crud-ajax",
                          data: {
                            question: question,
                            postingTime: postingTime,
                            deadlineSubmission: deadlineSubmission,
                              type: 'create'
                          },
                          type: "POST",
                          success: function (data) {
                              displayMessage("Event created.");

                              calendar.fullCalendar('renderEvent', {
                                  id: data.id,
                                  title: question,
                                  start: postingTime,
                                  end: deadlineSubmission,
                                  allDay: allDay
                              }, true);
                              calendar.fullCalendar('unselect');
                          }
                      });
                  }
              },
              eventDrop: function (event, delta) {
                  var postingTime = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                  var deadlineSubmission = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                  $.ajax({
                      url: SITEURL + '/calendar-crud-ajax',
                      data: {
                          title: event.question,
                          start: postingTime,
                          end: deadlineSubmission,
                          id: event.id,
                          type: 'edit'
                      },
                      type: "POST",
                      success: function (response) {
                          displayMessage("Event updated");
                      }
                  });
              },
              eventClick: function (event) {
                  var eventDelete = confirm("Are you sure?");
                  if (eventDelete) {
                      $.ajax({
                          type: "POST",
                          url: SITEURL + '/calendar-crud-ajax',
                          data: {
                              id: event.id,
                              type: 'delete'
                          },
                          success: function (response) {
                              calendar.fullCalendar('removeEvents', event.id);
                              displayMessage("Event removed");
                          }
                      });
                  }
              }
          });
      });

      function displayMessage(message) {
          toastr.success(message, 'Event');            
      }

  </script>

    @endsection
</div>
@endsection