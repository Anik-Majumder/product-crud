@extends('master') @section('content')

<div class="container">
    <div class="mb-4">
        <h1>Products</h1>
        <div class="d-flex align-items-center">
            <a
                href="{{ Route('create') }}"
                class="btn btn-success btn-sm me-4 h-100"
                type="button"
                >Create New Product</a
            >

            <form action="" method="GET">
                <div class="d-flex">
                    <div class="h-50">
                        <label for="" class="fs-6">Filter By Stock</label>
                        <select
                            name="stock"
                            placeholder="stock"
                            class="form-select w-auto"
                            aria-label="Default select example"
                            required
                        >
                            <option selected>Select</option>
                            <option value="instock">In Stock</option>
                            <option value="stockout">Stock Out</option>
                        </select>
                    </div>
                    <div class="ms-2">
                        <br />
                        <button class="btn btn-outline-primary" type="submit">
                            Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- card starts -->
        @foreach($products as $item)
        <div class="col">
            <div class="card h-100">
                <img
                    src=" {{ URL('storage/'.$item->image) }}"
                    class="card-img-top"
                    alt="..."
                    height="300"
                />
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">
                        {{ $item->details }}
                    </p>
                </div>
                <div class="card-footer">
                    <div
                        class="btn-group"
                        role="group"
                        aria-label="Basic mixed styles example"
                    >
                        <a
                            href="{{ Route('edit', $item->id) }}"
                            class="btn btn-warning rounded-end"
                            >Edit</a
                        >

                        <form
                            action="{{ Route('delete', $item->id) }}"
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
