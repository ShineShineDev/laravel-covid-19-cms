<div id="news" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <form method="post" action="{{ route('admin_news.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content bg-dark login-box text-info">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Add A News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="material-icons text-white">cancel</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="date"  class="form-control"  id="date">
                    <div class="form-group">
                        <label for="title">Title* <i class="text-warning">required</i></label>
                        <input type="text" name="title" class="form-control" placeholder="Title" id="title">
                    </div>

                    <div class="form-group">
                        <label for="desc">Text*<i class="text-warning">required</i></label>
                        <textarea name="text" class="form-control text-dark"  id="desc"></textarea>
                    </div>
                    <div class="from-group">
                        <label for="file">
                            <i class="material-icons">photo</i>
                            Maximum size 2M ,reduced size
                            <span class="text-warning">png,jpg,jpeg,pdf,</span>
                        </label>
                        <input type="file" name="file[]" multiple style="display: none" id="file">

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
