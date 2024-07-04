@extends('master') @section('content')

<div class="container">
    <div class="mb-4">
        <h1>Products</h1>
        <a
            href="{{ Route('create') }}"
            class="btn btn-success btn-sm"
            type="button"
            >Create New Product</a
        >
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- card starts -->
        @foreach($products as $items)
        <div class="col">
            <div class="card h-100">
                <img
                    src=" {{ URL('storage/'.$items->image) }}"
                    class="card-img-top"
                    alt="..."
                    height="300"
                />
                <div class="card-body">
                    <h5 class="card-title">{{ $items->name }}</h5>
                    <p class="card-text">
                        {{ $items->details }}
                    </p>
                </div>
                <div class="card-footer">
                    <div
                        class="btn-group"
                        role="group"
                        aria-label="Basic mixed styles example"
                    >
                        <a
                            href="{{ Route('edit', $items->id) }}"
                            class="btn btn-warning rounded-end"
                            >Edit</a
                        >

                        <form
                            action="{{ Route('delete', $items->id) }}"
                            method="POST"
                            class="d-inline"
                        >
                            @csrf @method('DELETE')<button
                                type="submit"
                                class="btn btn-danger ms-2"
                            >
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- card ends -->
    </div>
</div>

@endsection
