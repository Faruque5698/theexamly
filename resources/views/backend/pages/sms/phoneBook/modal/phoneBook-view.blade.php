<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Phone Book Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">

                    <tbody>
                       {{--  <tr>
                            <td style="text-align: center;" colspan="2"><img id="user_image"
                                    style="border-radius: 7px; width:200px; height:200px;" src=""></td>
                        </tr> --}}
                        <tr>
                            <td class="text-capitalize font-weight-bold font-italic">Name </td>
                            <td id="names"></td>

                        </tr>
                        <tr>
                            <td class="text-capitalize font-weight-bold font-italic">phone No </td>
                            <td id="mobile"></td>

                        </tr>
                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> Email</td>
                            <td id="emails"></td>

                        </tr>
                        <tr>
                            <td class="text-capitalize font-weight-bold font-italic">Group Name</td>
                            <td id="group_no"></td>

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
