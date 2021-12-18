@extends('layouts.admin-app');
@section('content')
    <div class="col-md-9">
        <form method="post" action="{{ url('admin/knowledge/update/'.$video->id) }}">
            @csrf
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
                        <input type="text" name="title" value="{{$video->title}}" class="form-control" placeholder="Title" id="title">
                    </div>

                    <div class="form-group">
                        <label for="desc">Description*</label>
                        <textarea name="description"  class="form-control text-dark"  id="desc">{{$video->description}}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="s-link">Source Link*</label>
                        <input type="text" name="source_link" value="{{ $video->source_link }}" class="form-control" placeholder="Source Link" id="s-link">
                    </div>

                    <div class="form-group">
                        <label for="frame">I-Frame* <small class="text-warning">required</small></label>
                        <textarea  name="frame" class="form-control"  id="frame">{{$video->frame}}
                </textarea>
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