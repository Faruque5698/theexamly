<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Promotional Modal Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered student-dm">

                    <tbody>
                        {{-- <tr>
                            <td class="text-capitalize font-weight-bold font-italic">Title </td>
                            <td id="title"></td>

                        </tr> --}}
                        <tr>
                            <td class="text-capitalize font-weight-bold font-italic">Description </td>
                            <td id="description"></td>

                        </tr> 
                        <tr>
                            <td class="text-capitalize font-weight-bold font-italic">Image </td>
                            <td colspan="2"><img id="image" style="border-radius: 7px; width:100px; height:100px;" src=""></td>

                        </tr>
                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic">Status </td>
                            <td id="status"></td>

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
