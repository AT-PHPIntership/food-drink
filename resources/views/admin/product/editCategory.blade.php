@foreach ($categories as $category)
	<option value="{{ $category->id }}" {{ $product->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
@endforeach
