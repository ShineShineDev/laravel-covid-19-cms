<div id="recoveredCases" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
    <div class="modal-dialog rounded" role="document">
        <div class="modal-content bg-dark login-box rounded">
            <form method="post" action="{{ route('recovered.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title text-info" id="exampleModalLiveLabel">Add Recovered</h5>
                    <div>
                        <button type="button" class="btn btn-sm login-box bth-dark text-info" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-sm login-box btn-dark text-info" value="Save">
                    </div>
                </div>
                <div class="modal-body">
                    <p class="text-info">Choose People <i></i></p>
                    <input type="text" list="browsers" name="active_id" class="form-control" autocomplete="off">
                    <datalist id="browsers" class="bg-dark login-box" autocapitalize="off">
                        @foreach($actives as $active)
                            <option value="{{ $active->id }}" class="bg-dark login-box">{{ $active->name }}</option>
                        @endforeach
                    </datalist>
                    <input type="hidden" name="date"  id="date">
                </div>
            </form>
        </div>
    </div>
</div>
