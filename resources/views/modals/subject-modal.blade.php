 <!-- Modal -->
 <div class="modal fade" id="subjectModal" tabindex="-1" role="dialog" aria-labelledby="subjectModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subjectModalLabel">New Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="newSubject" action="javascript:void(0)"  enctype="multipart/form-data">                                                
                    @csrf
                    <div class="form-group">
                        <label for="name">Subject:</label>
                        <input type="text" class="form-control"  name="new_subject">
                    </div>                                                                                                                                

                    <button type="button" class="btn btn-outline-brand" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-brand" value='Save changes'>                                   

                    <div class="alert d-none mt-5 sm-flex" role="alert" id="subjectMessage">
                        <div class="alert-text"></div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
