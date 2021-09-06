@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="d-flex">
                <h4>Search books:
                    <form action="{{ route('books.index') }}" method="GET" class="form-inline pull-right">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <input type="text" name="author" id="author" class="form-control" placeholder="Author">
                        </div>
                        <div class="form-group">
                            <input type="text" name="publish_date" id="publish_date" class="form-control" placeholder="Publish Date">
                        </div>
                        <div class="form-group">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Category</option>
                                @foreach($categories as $item)
                                <option value="{{ $item->category_id}}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="available" id="available" class="form-control">
                                <option value="">Status</option>
                                <option value="0">Borrowed</option>
                                <option value="1">Available</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">{{ __('Search') }}</button>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('books.index') }}" class="btn btn-outline-danger">
                                {{ __('Clear Search') }}
                            </a>
                        </div>
                    </form>
                </h4>
                
            </div>
            
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="mb-0">Books</h3>
                        </div>
                        <div>
                            <a href="{{ route('books.create') }}" class="btn btn-primary">
                                {{ __('New Book')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($books->count())
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Title') }}</th>
                                <th scope="col">{{ __('Author') }}</th>
                                <th scope="col">{{ __('Publish Date') }}</th>
                                <th scope="col">{{ __('Category') }}</th>
                                <th scope="col">{{ __('Available') }}</th>
                                <th scope="col">{{ __('Change Status') }}</th>
                                <th scope="col">{{ __('Edit') }}</th>
                                <th scope="col">{{ __('Show') }}</th>
                                <th scope="col">{{ __('Delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                            <tr>
                                <th scope="row">{{ $book->book_id }}</th>
                                <td>{{ $book->book }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->publish_date }}</td>
                                <td>{{ $book->category }}</td>
                                @if($book->available == 1)
                                <td>Available</td>
                                @else
                                <td>Borrowed</td>
                                @endif
                                <td>
                                    <form action="{{ route('books.available', $book->book_id) }}" method="POST">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <input type="submit" class="btn btn-success btn-sm" value="Change Status" onclick="return confirm('Are you confirming that the availability status has changed?')">
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('books.edit', $book->book_id) }}" class="btn btn-warning btn-sm">
                                        {{ __('Edit') }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('books.show', $book->book_id) }}" class="btn btn-secondary btn-sm">
                                        {{ __('Show') }}
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('books.destroy', $book->book_id) }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Do you confirm that you want to delete this record?')">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                        {!! $books->links() !!}
                        </ul>
                    </nav>
                    
                    @else
                    <h5>{{ __('There are no books') }}</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection