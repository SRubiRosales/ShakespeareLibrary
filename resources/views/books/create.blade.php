@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">New Book</h3>
                    </div>
                    <div>
                        <a href="{{ route('books.index') }}" class="btn btn-danger">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf
                    @include('books.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection