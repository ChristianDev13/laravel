<form method="POST" value="{{ old('name', $product->name) }}">

    @csrf
    @method('PUT')