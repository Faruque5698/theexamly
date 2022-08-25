<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Archive Batch Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered student-dm">

                    <tbody>
                        <tr>
                            <td class="text-capitalize font-weight-bold font-italic">Name </td>
                            <td id="name"></td>

                        </tr>
                        
                        {{-- <tr>
                            <td class="text-capitalize font-weight-bold font-italic">Batch Category </td>
                            <td id="batchCategory"></td>

                        </tr> --}}

                        <tr>
                            <td class="text-capitalize font-weight-bold font-italic">Course Type </td>
                            <td id="course_id"></td>

                        </tr>

                        {{-- <tr>
                            <td class="text-capitalize font-weight-bold font-italic">Course Fee </td>
                            <td id="course_fee"></td>

                        </tr> --}}

                        <tr>
                            <td class="text-capitalize font-weight-bold font-italic">Start Date </td>
                            <td id="start_date"></td>

                        </tr>
                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic">End Date</td>
                            <td id="end_date"></td>

                        </tr>

                        {{-- <tr>

                            <td class="text-capitalize font-weight-bold font-italic">Start Time</td>
                            <td id="start_time"></td>

                        </tr>

                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic">End Time </td>
                            <td id="end_time"></td>

                        </tr> --}}
                        
                    {{-- <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> Days</td>
                            <td id="days"></td>

                        </tr> --}}

                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic">Seat Capacity</td>
                            <td id="seat_capacity"></td>

                        </tr>

                        <tr id="days_row">

                            <td class="text-capitalize font-weight-bold font-italic"> Days</td>
                            <td id="days"></td>

                        </tr>

                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic">Description </td>
                            <td id="description"></td>

                        </tr>

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
