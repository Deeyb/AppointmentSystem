<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop Appointment System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/calendar.css"/>
    <style>
    .fc-event {
  width: 140px; /* Adjust width as needed */
  height: 50px; /* Adjust height as needed */
  margin: 0 auto; /* This will center the event horizontally */
  display: flex;
  justify-content: center; /* Center content horizontally */
  align-items: center; /* Center content vertically */
  text-align: center; /* Center text inside the box */
  background: #blue; /* Set your preferred background color */
  color: white; /* Set your preferred text color */
  border-radius: 10px; /* Optional: for rounded corners */
  /* Add any additional styling you like for the box */
}

.fc-content {
  width: 100%; /* This ensures the inner content uses all available space */
}

  </style>
</head>
<body>
    <div class="container">
        <h2 class="my-4">Book Your Appointment</h2>
        <div id="calendar"></div>
        <a href="../dashboard.php"id="backButton" class="btn btn-primary text-center mt-3">Back</a>
    </div>
    </div>
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Appointment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="bookingForm">
                        <div class="form-group">
                            <label for="ownerName">Owner's Name</label>
                            <input type="text" class="form-control" id="ownerName" required>
                        </div>
                        <div class="form-group">
                            <label for="petName">Pet's Name</label>
                            <input type="text" class="form-control" id="petName" required>
                        </div>
                        <div class="form-group">
                            <label for="appointmentType">Appointment Type</label>
                            <select class="form-control" id="appointmentType">

                                <option>Grooming</option>
                                <option>Boarding</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="appointmentTime">Appointment Time</label>
                            <input type="datetime-local" class="form-control" id="appointmentTime" min="08:00" max="17:00" required>
                        </div>
                        <div class="form-group">
                            <label for="contactInfo">Contact Info</label>
                            <input type="text" class="form-control" id="contactInfo" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function () {
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'month',
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectHelper: true,
             eventRender: function(event, element) {
            // Clear any previously set content inside the element
            element.find('.fc-content').empty();
            // Create a new div that will contain the event text, with the class to center the text
            var newContent = $('<div class="text-center"/>').text(event.title);
            // Append the new content to the event element
            element.find('.fc-content').html(newContent);
        },
            events: 'fetch_appointments.php',  // URL to fetch events
            select: function(start, end) {
                var date = moment(start).format('YYYY-MM-DD HH:mm:ss');
                $('#appointmentTime').val(date);
                $('#bookingModal').modal('show');
                $('#bookingForm').off('submit').on('submit', function(e){
                    e.preventDefault();
                    bookAppointment(date, calendar);
                });
            }
            
        });

        function bookAppointment(date, calendar) {
        var ownerName = $('#ownerName').val();
        var petName = $('#petName').val();
        var appointmentType = $('#appointmentType').val();
        var contactInfo = $('#contactInfo').val();
        var appointmentTime = $('#appointmentTime').val(); // Ensure this is in 'YYYY-MM-DDTHH:mm' format

        console.log('Booking appointment at:', appointmentTime); // Debugging: Log the appointment time

        $.ajax({
            url: 'book_appointment.php',
            type: 'POST',
            data: {
                owner_name: ownerName,
                pet_name: petName,
                appointment_type: appointmentType,
                appointment_time: appointmentTime, // Send the correct variable
                contact_info: contactInfo
            },
                success: function(response) {
                    $('#bookingModal').modal('hide');
                    alert('Appointment booked successfully!');
                    calendar.fullCalendar('refetchEvents');  // Refresh calendar events
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                    console.error("Status: " + status);
                    console.error("Response: " + xhr.responseText);
                    alert('Failed to book the appointment!');
                }
            });
        }
        
    });
    </script>
</body>
</html>
