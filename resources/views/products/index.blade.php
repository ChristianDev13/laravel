<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product Management</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7f6;
            color: #17252a;
        }

        .navbar {
            background: #102a2e;
            padding: 22px 7%;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
        }

        .logo span {
            color: #52b788;
        }

        .container {
            width: 86%;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 30px;
        }

        .header p {
            color: #777;
            margin-top: 6px;
        }

        .btn {
            border: none;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-add {
            background: #2d6a4f;
            color: white;
        }

        .btn-add:hover {
            background: #1b4332;
        }

        .search-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
        }

        .search-box form {
            display: flex;
            gap: 10px;
        }

        .search-box input {
            flex: 1;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 7px;
            outline: none;
        }

        .search-btn {
            background: #102a2e;
            color: white;
        }

        .table-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #102a2e;
            color: white;
            text-align: left;
            padding: 16px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #f8faf9;
        }

        .price {
            color: #2d6a4f;
            font-weight: bold;
        }

        .stock {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .available {
            background: #d8f3dc;
            color: #1b4332;
        }

        .low {
            background: #fff3cd;
            color: #856404;
        }

        .out {
            background: #f8d7da;
            color: #842029;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .edit {
            background: #e9f5db;
            color: #2d6a4f;
        }

        .delete {
            background: #f8d7da;
            color: #842029;
        }

        .alert {
            background: #d8f3dc;
            color: #1b4332;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        @media(max-width: 800px) {
            .container {
                width: 94%;
            }

            .table-card {
                overflow-x: auto;
            }

            table {
                min-width: 800px;
            }

            .header {
                gap: 15px;
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <div class="logo">
        Product<span>Hub</span>
    </div>

    <div style="display:flex; align-items:center; gap:20px;">

        <span>
            Admin: {{ Auth::user()->name }}
        </span>

        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf

            <button
                type="submit"
                style="
                    background:#c1121f;
                    color:white;
                    border:none;
                    padding:9px 15px;
                    border-radius:7px;
                    cursor:pointer;
                    font-weight:bold;
                "
            >
                Logout
            </button>

        </form>

    </div>

</nav>

<div class="container">

    <div class="header">
        <div>
            <h1>Product Management</h1>
            <p>Manage your products efficiently.</p>
        </div>

        <a href="{{ route('products.create') }}" class="btn btn-add">
            + Add Product
        </a>
    </div>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="search-box">
        <form method="GET" action="{{ route('products.index') }}">

            <input
                type="text"
                name="search"
                placeholder="Search product or category..."
                value="{{ $search }}"
            >

            <button class="btn search-btn">
                Search
            </button>

        </form>
    </div>

    <div class="table-card">

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

            @forelse($products as $product)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <strong>{{ $product->name }}</strong>
                    </td>

                    <td>
                        {{ $product->category }}
                    </td>

                    <td class="price">
                        ₱{{ number_format($product->price, 2) }}
                    </td>

                    <td>
                        {{ $product->quantity }}
                    </td>

                    <td>

                        @if($product->quantity == 0)

                            <span class="stock out">
                                Out of Stock
                            </span>

                        @elseif($product->quantity < 10)

                            <span class="stock low">
                                Low Stock
                            </span>

                        @else

                            <span class="stock available">
                                Available
                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="actions">

                            <a
                                href="{{ route('products.edit', $product) }}"
                                class="btn edit"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('products.destroy', $product) }}"
                                method="POST"
                                onsubmit="return confirm('Delete this product?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button class="btn delete">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="7" style="text-align:center; padding:40px;">
                        No products found.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>