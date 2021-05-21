		<table class="table table-bordered">
			<thead>
				<tr class="tr-admin">
					<th>Tên tỉnh, thành phố</th>
					<th>Tên quận huyện</th>
					<th>Tên xã phường</th>
					<th>Phí ship</th>
					<th class="text-center">Thao tác</th>
				</tr>
			</thead>
			<tbody class="load-delivery">
				@foreach ($feeship as $value)
				<tr>
					<td>{{ $value->Tbl_tinhthanhpho->name }}</td>
					<td>{{ $value->Tbl_quanhuyen->name }}</td>
					<td>{{ $value->Tbl_xaphuongthitran->name }}</td>
					<td contenteditable data-id="{{ $value->id }}" class="feeship_edit" name="feeship">{{ currency_format($value->feeship)}}</td>
					<td class="text-center"><a data-href="{{ $value->id }}" class="xoa-delivery" style="cursor:pointer;"><i class="fa fa-times text-danger"></i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="card-footer-ajax" style="padding:10px 20px">
			{!!$feeship->appends(Request()->all())!!}
		</div>