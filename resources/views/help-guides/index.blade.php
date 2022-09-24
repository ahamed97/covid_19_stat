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
                            @foreach ($helpGuides as $helpGuide)
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-10 col-lg-10 ">
                                        <div class=" shadow-0 border mb-2" style="background-color: #f0f2f5;">
                                            <div class="card-body">
                                                <p>{{ $helpGuide->description ?? '-' }}</p>
                                                @if ($helpGuide->link)
                                                    <span class="m-b-15 d-block">Related Article Link : <a
                                                            href="{{ $helpGuide->link ?? '-' }}"
                                                            target="_blank">{{ $helpGuide->link ?? '-' }}</a></span>
                                                @endif
                                                <span class="text-muted float-left">Created By :
                                                    {{ $helpGuide->user->name ?? '-' }}</span>
                                                <span class="text-muted float-left">Created At :
                                                    {{ $helpGuide->created_at ?? '-' }}</span>
                                            </div>
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

                                                </span>

                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
