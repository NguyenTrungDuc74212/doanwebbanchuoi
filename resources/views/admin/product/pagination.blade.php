@foreach ($data as $value)
<tr>
	<td>
		<img src="{{asset('public/upload/product/'.$value->image)}}" height="100" width="100">
	</td>
	<td>{{ $value->name }}</td>
	<td>{{   $value->category_product->name }}</td>
	<td>{{currency_format($value->price) }}</td>
	<td>
		@can('admin')
		<a onclick="return confirm('Bạn có chắc xóa sản phẩm này không?')" href="" data-id="{{ $value->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
		@endcan
		<a href="{{ route('edit_product',$value->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
	</td>
</tr>
@endforeach
