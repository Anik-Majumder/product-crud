@extends('master') @section('content')

<div class="container">
    <div class="head pb-4 mb-4">
        <h1>Create Product</h1>
        <a
            href="{{ Route('home') }}"
            class="btn btn-secondary btn-sm"
            type="button"
            >Go back</a
        >
    </div>
    <div class="form W-50 border p-4">
        <form
            action="{{ Route('store') }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    id="formGroupExampleInput"
                    placeholder="Name"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input
                    type="text"
                    name="status"
                    class="form-control"
                    id="formGroupExampleInput"
                    placeholder="status"
                    required
                />
            </div>
            <!-- <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input
                    type="text"
                    name="stock"
                    class="form-control"
                    id="formGroupExampleInput"
                    placeholder="stock"
                    required
                />
            </div> -->

            <select
                name="stock"
                placeholder="stock"
                class="form-select"
                aria-label="Default select example"
                required
            >
                <option value="instock">In Stock</option>
                <option value="stockout">Stock Out</option>
            </select>

            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <textarea
                    name="details"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="6"
                    placeholder="Details"
                    required
                ></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input
                    name="image"
                    class="form-control form-control-sm"
                    id="formFileSm"
                    type="file"
                />
            </div>
            <button type="submit" class="btn btn-info">Create</button>
        </form>
    </div>
</div>

@endsection
