<div id="knowledge" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <form method="post" action="{{ url('admin/knowledge/store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content bg-dark login-box text-info">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Add Knowledge</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="material-icons text-white">cancel</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" id="title">
                    </div>

                    <div class="form-group">
                        <label for="desc">Description*</label>
                        <textarea name="description" class="form-control text-dark"  id="desc">Description
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="s-link">Source Link*</label>
                        <input type="text" name="source_link" class="form-control" placeholder="Source Link" id="s-link">
                    </div>

                    <div class="form-group">
                        <label for="frame">I-Frame* <small class="text-warning">required</small></label>
                        <input type="text" name="frame" class="form-control" placeholder="Frame" id="frame">
                    </div>
                </div>
                <div class="modal-footer mt-0">
                    <button type="button" class="btn btn-sm pl-3 pr-3 bg-dark text-info btn-at-white" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-sm pl-3 pr-3  bg-dark text-info btn-at-white" value="Save">
                </div>
            </div>
        </form>
    </div>
</div>
