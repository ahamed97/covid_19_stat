@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="row m-2">
                            <div class="col-11">
                                <h4>{{__('Help & Guide')}}</h4>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="comment-widgets">
                            <form method="POST" action="{{ route('help-guides.store') }}">
                                @csrf
                                <div class="form-group m-2">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Description" rows="3"></textarea>
                                </div>
                                <div class="form-group m-2">
                                    <label for="link">Related Article Link</label>
                                    <input type="url" class="form-control" name="link" id="link"
                                        placeholder="Link">
                                </div>
                                <button type="submit" class="btn btn-primary m-2">Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
