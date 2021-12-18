<div id="activeCases" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <form method="post" action="{{ route('active.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content bg-dark login-box text-info">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Active cases</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="material-icons text-white">cancel</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">

                        <input type="hidden" name="date"  id="date">

                        <label for="name">Name* <small class="text-warning">required</small></label>
                        <input type="text" name="name" class="form-control" placeholder="Name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="age">Age*</label>
                        <input type="number" name="age" class="form-control" placeholder="Age" id="age">
                    </div>
                    <div class="form-group">
                        <label for="address">Address*</label>
                        <input type="text" name="address" class="form-control" placeholder="Address" id="address">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender*</label>
                        <select id="gender" name="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="infected">From Infected*</label>
                        <input list="browsers" class="form-control" name="infected" id="infected" autocomplete="off">
                        <datalist id="browsers" autocapitalize="off">
                            <option value="0">Patient Zero</option>
                            @foreach($actives as $active)
                                <option value="{{$active->id}}">{{ $active->name }}</option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="photo">
                            <span class="material-icons text-primary float-left">photo</span>
                            Maximum size 2M ,reduced size
                        </label>
                        <input type="file" name="photo" class="form-control" placeholder="Address" id="photo" style="display: none;">
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
