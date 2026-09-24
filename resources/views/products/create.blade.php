<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7f6;
        }

        .container {
            width: 600px;
            max-width: 92%;
            margin: 50px auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,.08);
        }

        h1 {
            color: #102a2e;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin: 15px 0 7px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 7px;
            outline: none;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        .row {
            display: flex;
            gap: 15px;
        }

        .row > div {
            flex: 1;
        }

        button,
        a {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        button {
            background: #2d6a4f;
            color: white;
        }

        .back {
            background: #eee;
            color: #333;
            margin-right: 8px;
        }

        .error {
            color: #b02a37;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Add New Product</h1>

        <form method="POST" action="{{ route('products.store') }}">

            @csrf

            <label>Product Name</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter product name"
            >

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror


            <label>Category</label>

            <input
                type="text"
                name="category"
                value="{{ old('category') }}"
                placeholder="Enter category"
            >

            @error('category')
                <div class="error">{{ $message }}</div>
            @enderror


            <div class="row">

                <div>

                    <label>Price</label>

                    <input
                        type="number"
                        name="price"
                        step="0.01"
                        value="{{ old('price') }}"
                        placeholder="0.00"
                    >

                </div>

                <div>

                    <label>Quantity</label>

                    <input
                        type="number"
                        name="quantity"
                        value="{{ old('quantity') }}"
                        placeholder="0"
                    >

                </div>

            </div>


            <label>Description</label>

            <textarea
                name="description"
                placeholder="Product description..."
            >{{ old('description') }}</textarea>


            <a href="{{ route('products.index') }}" class="back">
                Cancel
            </a>

            <button type="submit">
                Save Product
            </button>

        </form>

    </div>

</div>

</body>
</html>