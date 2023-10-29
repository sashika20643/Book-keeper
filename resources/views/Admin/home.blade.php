@extends('Admin.layouts.dashboard')


@section('content')
<div class="container">
<h2 style="text-align:center;" class="mb-5">Books</h2>

<!-- Add Book Button -->
<div class="w-100 text-right" style="text-align: right;">
    <a href="{{ route('Admin.books.create') }}" class="btn btn-primary mb-3">Add Book</a>
</div>

<div class="container">
<!-- Display Books as Cards -->
<div class="row">
    @foreach ($books as $book)
        <div class="col-md-4 mb-4">
            <div class="card bookc">
                <div class="card-body">

                    <h5 class="card-title">{{ $book->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $book->author }}</h6>
                    <p class="card-text">Price: ${{ $book->price }}</p>
                    <p class="card-text">Stock: {{ $book->stock }}</p>
                    @if ($book->stock ==0)


                    <div >
                        <h6 class="text-danger" style="text-align: right">Out of stock</h6>
                    </div>
                    @endif
                    <div class=" w-100 justify-content-center hover-effect pt-2 pb-2">
                        <a href="{{ route('Admin.books.edit',$book->id) }}" class="btn btn-warning me-2">Edit</a>
                        <form action="{{ route('Admin.books.delete',$book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>
</div>

@endsection




