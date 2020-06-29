@extends('index')
@section('content')
<style> 
input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid red;
  border-radius: 4px;
}

</style>
	<div class="container">
			<div class="row">
				<div class="col-md-10">
					<h3>List Data Supplier</h3>
					<form action="suplier-cari" method="get">
						<div class="col-md-6">
						<input type="text" name="cari" placeholder="Cari Supplier" value="{{ old('cari')}}">
						<input class="btn btn-sm btn-success" type="submit" value="Cari">
						</div>
					</form>
					<hr>
					<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
				</div>
				<div classs="col-md-2">
					<a class="btn btn-sm btn-primary" href="{{route('suplier.create')}}"><i class="fa big-icon fa fa-plus-square"></i> Tambah Data</a>

				</div>
			</div>
			@if($message= Session::get('success'))
				<div class="alert alert-success">
					<p>{{$message}}</p>
				</div>
			@endif

			<table class="w3-table-all w3-card-4">
				<tr class="w3-grey">
					<th width="50px"><b>No.</b></th>
					<th width="300px">Nama Supplier</th>
					<th width="300px">Alamat</th>
					<th width="300px">Telpon</th>
					<th width="180">Action</th>
				</tr>

				@foreach($supliers as $suplier)
					<tr>
						<td><b>{{++$i}}.</b></td>
						<td>{{$suplier->nama_suplier}}</td>
						<td>{{$suplier->alamat_suplier}}</td>
						<td>{{$suplier->no_telp}}</td>

						
						<td>
							<form action="{{route('suplier.destroy', $suplier->id_suplier)}}" method="post"> 
								<a class="btn btn-sm btn-success" class="fas fa-edit" href="{{route('suplier.show', $suplier->id_suplier)}}"><i class="fa big-icon fas fa-eye"></i></a>
								<a class="btn btn-sm btn-warning" href="{{route('suplier.edit', $suplier->id_suplier)}}"><i class="fa big-icon fas fa-edit"></i></a>
 
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-sm btn-danger"><i class="fa big-icon fas fa-trash"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			</table>


{!! $supliers->links() !!}
	</div>
@endsection