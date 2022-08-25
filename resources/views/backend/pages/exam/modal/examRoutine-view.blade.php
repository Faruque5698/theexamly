<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exam Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">

                    <tbody>
                        {{-- <tr>
                            <td style="text-align: center;" colspan="2"><img id="user_image"
                                    style="border-radius: 7px; width:200px; height:200px;" src=""></td>
                        </tr> --}}
                        <tr>
                            <td class="text-capitalize font-weight-bold font-italic">Batch Name </td>
                            <td id="batch_name"></td>

                        </tr>
                        <tr>
                            <td class="text-capitalize font-weight-bold font-italic">Exam Title </td>
                            <td id="exam_title"></td>

                        </tr>
                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> Date</td>
                            <td id="date"></td>

                        </tr>

                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic">Subject</td>
                            <td id="subject_name"></td>

                        </tr>

                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> Start Time </td>
                            <td id="start_time"></td>

                        </tr>

                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> End Time</td>
                            <td id="end_time"></td>

                        </tr>

                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> Full Mark </td>
                            <td id="full_mark"></td>

                        </tr>

                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> Written </td>
                            <td id="written"></td>

                        </tr>

                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> MCQ </td>
                            <td id="mcq"></td>

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
