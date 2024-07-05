@extends('layout')

@section('content')

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Data Karyawan</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Data</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Karyawan</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">

					@if (session('status'))
					<div class="alert alert-close alert-success">
						<a href="#" title="Close" class="fa fa-remove"></a>
						<div class="alert-content">
							<p>{{ session('status') }}</p>
						</div>
					</div>
					@endif

					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Data Karyawan</h4>
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddKaryawan">
									<i class="fa fa-plus"></i>
									Tambah Data
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Karyawan</th>
											<th>Jabatan</th>
											<th>No Telp</th>
											<th>Email</th>
											<th>Alamat</th>
											<th>Aksi</th>
										</tr>
									</thead>

									<tbody>
										@php $no = 1; @endphp
										@foreach ($karyawan as $row)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $row->nama_karyawan }}</td>
											<td>{{ $row->jabatan }}</td>
											<td>{{ $row->no_tlp }}</td>
											<td>{{ $row->email }}</td>
											<td>{{ $row->alamat }}</td>
											<td>
												<a href="#modalEditKaryawan{{ $row->id }}" data-toggle="modal" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
												<a href="#modalHapusKaryawan{{ $row->id }}" data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalAddKaryawan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-light">
						Karyawan</span>
					<span class="fw-mediumbold">
						Baru
					</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/karyawan/store">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Karyawan</label>
						<input type="text" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan ..." required="">
					</div>

					<div class="form-group">
						<label>Jabatan</label>
						<select class="form-control" name="jabatan" required="">
						<option value="" hidden="">-- Pilih Jabatan --</option>
							@foreach ($jabatan as $data)
							<option value="{{ $data->jabatan }}">{{ $data->jabatan }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>No Telpon</label>
						<input type="text" name="no_tlp" class="form-control" placeholder="No Telpon ..." required="">
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" placeholder="Email ..." required="">
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<textarea placeholder="Alamat ..." class="form-control" rows="5" name="alamat" style="white-space: pre-line;" required=""></textarea>
					</div>

				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>

@foreach ($karyawan as $d)

<div class="modal fade" id="modalEditKaryawan{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
						Edit</span>
					<span class="fw-light">
						Karyawan
					</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/karyawan/{{ $d->id }}/update">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Karyawan</label>
						<input type="text" value="{{ $d->nama_karyawan }}" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan ..." required="">
					</div>

					<div class="form-group">
						<label>No Telpon</label>
						<input type="text" name="no_tlp" value="{{ $d->no_tlp }}" class="form-control" placeholder="No Telpon ..." required="">
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" value="{{ $d->email }}" name="email" class="form-control" placeholder="Email ..." required="">
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<textarea placeholder="Alamat ..." class="form-control" rows="5" name="alamat" style="white-space: pre-line;" required="">{{ $d->alamat }}</textarea>
					</div>

				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endforeach

@foreach ($karyawan as $d)

<div class="modal fade" id="modalHapusKaryawan{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
						Hapus</span>
					<span class="fw-light">
						Karyawan
					</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="GET" enctype="multipart/form-data" action="/karyawan/{{ $d->id }}/destroy">
				@csrf
				<div class="modal-body">
					<h4>Apakah Anda Ingin Menghapus Data Ini ?</h4>
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endforeach

@endsection