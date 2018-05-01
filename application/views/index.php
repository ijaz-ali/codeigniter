<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calendar</title>
        <link rel='stylesheet' href='<?php echo base_url('assets/calendar/'); ?>fullcalendar.css' />
        <link rel='stylesheet' href='<?php echo base_url('assets/css/'); ?>bootstrap.min.css' />
        <link href='<?php echo base_url('assets/calendar/'); ?>fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <script src='<?php echo base_url('assets/calendar/'); ?>jquery.min.js'></script>
        <script src='<?php echo base_url('assets/js/'); ?>jquery.min.js'></script>
        <script src='<?php echo base_url('assets/calendar/'); ?>moment.min.js'></script>
        <script src='<?php echo base_url('assets/calendar/'); ?>fullcalendar.js'></script>
        <script src="<?php echo base_url('assets/js/'); ?>bootstrap.min.js"></script>
      
        <script src="<?php echo base_url(); ?>assets/datetime/jquery.datetimepicker.full.min.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>assets/datetime/jquery.datetimepicker.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h1>Calendar</h1>

                    <div id='calendar'></div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Calendar Event</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open(site_url("calendar/add_event"), array("class" => "form-horizontal")) ?>
                        <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading">Event Name</label>
                            <div class="col-md-8 ui-front">
                                <input type="text" class="form-control" name="name" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading">Description</label>
                            <div class="col-md-8 ui-front">
                                <input type="text" class="form-control" name="description">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading">Start Date</label>
                            <div class="col-md-8">
                                <input id="datetimepicker1" type="text"  class="form-control" name="start_date">
                                <!--<input type="text" class="form-control" name="start_date">-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading">End Date</label>
                            <div class="col-md-8">
                                <input id="datetimepicker2" type="text"  class="form-control" name="end_date">
                                <!--<input type="text" class="form-control" name="end_date">-->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Add Event">
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Update Calendar Event</h4>
                    </div>
                    <div class="modal-body">

                        
                        <form class="form-horizontal" method="post" action="<?php echo base_url('calendar/edit_event'); ?>">
                            <div class="form-group">
                                <label for="p-in" class="col-md-4 label-heading">Event Name</label>
                                <div class="col-md-8 ui-front">
                                    <input type="text" class="form-control" name="name" value="" id="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="p-in" class="col-md-4 label-heading">Description</label>
                                <div class="col-md-8 ui-front">
                                    <input type="text" class="form-control" name="description" id="description">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="p-in" class="col-md-4 label-heading">Start Date</label>
                                <div class="col-md-8">
                                    <!--<input type="text" class="form-control" name="start_date" id="start_date">-->
                                    <input id="datetimepicker3" type="text"  class="form-control" name="start_date" id="start_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="p-in" class="col-md-4 label-heading">End Date</label>
                                <div class="col-md-8">
                                    <!--<input type="text" class="form-control" name="end_date" id="end_date">-->
                                    <input id="datetimepicker4" type="text"  class="form-control" id="end_date" name="end_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="p-in" class="col-md-4 label-heading">Delete Event</label>
                                <div class="col-md-8">
                                    <input type="checkbox" name="delete" value="1">
                                </div>
                            </div>
                            <input type="hidden" name="eventid" id="event_id" value="0" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Update Event">
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <script type="text/javascript">
            
            $(document).ready(function () {
                jQuery('#datetimepicker1').datetimepicker();
                jQuery('#datetimepicker2').datetimepicker();
                jQuery('#datetimepicker3').datetimepicker();
                jQuery('#datetimepicker4').datetimepicker();
                var date_last_clicked = null;
                $('#calendar').fullCalendar({
                    editable: true,
                    droppable: true,
                    eventSources: [
                        {
                            events: function (start, end, timezone, callback) {
                                $.ajax({
                                    url: '<?php echo base_url() ?>Calendar/get_events',
                                    dataType: 'json',
                                    data: {
                                        start: start.unix(),
                                        end: end.unix()
                                    },
                                    success: function (msg) {
                                        var events = msg.events;
                                        callback(events);
                                    }
                                });
                            }

                        }
                    ],
                    dayClick: function (date, jsEvent, view) {
                        date_last_clicked = $(this);
                        $(this).css('background-color', '#bed7f3');
                        $('#addModal').modal();
                    },
                    eventClick: function (event, jsEvent, view) {
                        $('#name').val(event.title);
                        $('#description').val(event.description);
                        $('#datetimepicker3').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
                        if (event.end) {
                            $('#datetimepicker4').val(moment(event.end).format('YYYY/MM/DD HH:mm'));
                        } else {
                            $('#datetimepicker4').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
                        }
                        $('#event_id').val(event.id);
                        $('#editModal').modal();
                    }

                });
            });
        </script>
    </body>
</html>
