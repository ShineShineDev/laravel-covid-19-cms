<div id="death" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark login-box">
            <form method="post" action="{{ route('death.store') }}">
                @csrf
            <div class="modal-header">
                <h5 class="modal-title text-info" id="exampleModalLiveLabel">Add Death</h5>
                <div>
                <button type="button" class="btn btn-sm btn-dark login-box" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-sm btn-dark login-box" value="Save">
                </div>
            </div>
            <div class="modal-body">
                <p class=" text-info">Choose People <i></i></p>
                <input type="text" list="browsers" name="active_id" class="form-control" autocomplete="off">
                <datalist id="browsers" autocapitalize="off">
                    @foreach($actives as $active)
                    <option value="{{ $active->id }}">{{ $active->name }}</option>
                        @endforeach
                </datalist>
                <input type="hidden" name="date"  id="date">
            </div>
            </form>
        </div>
    </div>
</div>
