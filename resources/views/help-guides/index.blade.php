@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="row m-2">
                            <div class="col-10">
                                <h4>{{ __('Help & Guides') }}</h4>
                            </div>
                            <div class="col-2">
                                @auth
                                    <a class="btn btn-success btn-sm m-3" href="{{ route('help-guides.create') }}">Create</a>
                                @endauth
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (count($helpGuides) > 0)
                            <div class="comment-widgets">
                                @foreach ($helpGuides as $helpGuide)
                                    <!-- Comment Row -->
                                    <div class="d-flex flex-row comment-row m-1 border border-dark">
                                        <div class="comment-text w-100 p-2">
                                            <span class="m-b-15 d-block">{{ $helpGuide->description ?? '-' }}</span>
                                            <span class="m-b-15 d-block">Related Article Link : <a
                                                    href="{{ $helpGuide->link ?? '-' }}"
                                                    target="_blank">{{ $helpGuide->link ?? '-' }}</a></span>
                                            <div class="comment-footer">
                                                <span class="text-muted float-left">Created By :
                                                    {{ $helpGuide->user->name ?? '-' }}</span>
                                                <span class="text-muted float-left">Created At :
                                                    {{ $helpGuide->created_at ?? '-' }}</span>
                                                @if ($helpGuide->link)
                                                @endif
                                                @auth
                                                    <span class="d-block">
                                                        <div class="col-1">
                                                            <form action="user-help-guides/{{ $helpGuide->id }}"
                                                                class="form form-inline" method="POST">
                                                                {{ method_field('delete') }}
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger btn-sm m-3"
                                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                                            </form>
                                                        </div>
                                                </div>
                                                </span>

                                            @endauth
                                        </div>
                                    </div>
                                @endforeach
                            </div> <!-- Comment Row -->
                        @else
                            <p>Data not available.</p>
                        @endif
                        <div class="d-flex">
                            {!! $helpGuides->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
