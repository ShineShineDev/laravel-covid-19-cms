@extends('layouts.admin-app');
@section('content')
    <div class="col-md-9">
        <form method="post" action="{{ route('admin_news.update',$item->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="date"  class="form-control" id="date">
            <div class="modal-content bg-dark login-box text-info">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Edit</h5>
                    <button type="button" class="btn btn-dark login-box go-previous-page">
                        <span class="material-icons text-white">cancel</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" name="title" value="{{$item->title}}" class="form-control text-dark" id="title">
                    </div>

                    <div class="form-group">
                       <label for="desc">Text*</label>
                        <textarea name="text"  class="form-control text-dark"  id="desc">{{$item->text}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="file">
                            <span class="material-icons">photo</span>
                            <span class="text-warning"> Maximum size 2M ,reduced size</span>
                            <span class="text-warning">png,jpg,jpeg,pdf,</span>
                        </label>
                        <input type="file" name="file[]" multiple id="file" style="display: none;">
                    </div>
                </div>
                <div class="mb-4 ml-3">
                    <input type="submit" class="btn btn-sm pl-3 pr-3  bg-dark text-white btn-at-white" value="Save">
                    <button type="button" class="btn btn-sm pl-3 pr-3 bg-dark text-white btn-at-white go-previous-page">Cancel</button>
                </div>

            </div>
        </form>
    </div>
    @endsection