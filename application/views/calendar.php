<html>
    <head>
        <title>Calendar</title>
        <link rel='stylesheet' href='<?php echo base_url('assets/calendar/'); ?>fullcalendar.css' />
        <link rel='stylesheet' href='<?php echo base_url('assets/css/'); ?>bootstrap.min.css' />
        <link href='<?php echo base_url('assets/calendar/'); ?>fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <script src='<?php echo base_url('assets/calendar/'); ?>jquery.min.js'></script>
        <script src='<?php echo base_url('assets/js/'); ?>jquery.min.js'></script>
        <script src='<?php echo base_url('assets/calendar/'); ?>moment.min.js'></script>
        <script src='<?php echo base_url('assets/calendar/'); ?>fullcalendar.js'></script>
        <script src="<?php echo base_url('assets/js/'); ?>bootstrap.min.js"></script>

    </head>
    <body>

        <div id='calendar'></div>

        <!-- Modal -->
        <div id="calendarModal" class="modal fade" >
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Event</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Event Title</label>
                                <input type="text" class="form-control" id="title">
                            </div>
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="datetime-local" class="form-control" id="start_date">
                            </div>
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="datetime-local" class="form-control" id="end_date">
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <input type="url" class="form-control" id="url">
                            </div>

                            <button type="submit" id="btn" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <div id="show_data"></div>

        <script>

            $(document).ready(function () {
//               var calendar = $('#calendar').fullCalendar('getCalendar');
//               calendar.next();

                $('#calendar').fullCalendar({
                    eventSources: [
                        {
                            events: function (start, end, timezone, callback) {
                                $.ajax({
                                    url: '<?php echo base_url() ?>Calendar/View_Events',
                                    dataType: 'json',
                                    data: {

                                    },
                                    success: function (data) {
                                        var events = data.events;
                                        callback(events);
                                    }
                                });
                            }
                        }
                    ],
                    dayClick: function (e) {
                        $('#calendarModal').modal();
                        $(this).css('background-color', 'lightyellow');
                    },
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listWeek'
                    },

                    defaultDate: '2018-03-12',
                    editable: true,
                    navLinks: true,
                    //weekends: false,
                    eventLimit: true, // allow "more" link when too many events
                    events: [

                        {
                            
                        }
                    ]
                            // timeFormat: 'h(:mm)t'


                });
                $('#btn').on('click', function (e) {
                    // We don't want this to act as a link so cancel the link action
                    e.preventDefault();

                    doSubmit();
                });
                function doSubmit() {
                    $("#calendarModal").modal('hide');
                    $.ajax({
                        url: '<?php echo base_url(); ?>Calendar/InsertEvent',
                        data: {
                            title: $('#title').val(),
                            start_date: $("#start_date").val(),
                            end_date: $("#end_date").val(),
                            url: $("#url").val()

                        },
                        async: 'true',
                        cache: 'false',
                        type: 'post',
                        success: function (data) {
                            //jQuery("#attendence_report_holder").html(response);
                            alert("Data successfully added");
                        }
                    });
                }
            });

        </script>
    </body>


</html>