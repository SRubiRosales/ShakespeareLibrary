@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">{{ __('Book: ').$book->name }}</h3>
                    </div>
                    <div>
                        <a href="{{ route('books.edit', $book->book_id) }}" class="btn btn-warning">
                            {{ __('Edit book')}}
                        </a>
                        <a href="{{ route('books.index') }}" class="btn btn-danger">
                            {{ __('Go Back')}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul>
                    <li>{{ __('Author: ').$book->author }}</li>
                    <li>{{ __('Publish Date: ').$book->publish_date }}</li>
                    <li>{{ __('Category: ').$book->category }}</li>
                    @if($book->available == 1)
                        <li>{{ __('Availability: It is available') }}</li>
                    @else
                        <li>{{ __('Availability: It is not available') }}</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection