@extends('layout')

@section('content')

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Jabatan</h4>
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
								<a href="#">Jabatan</a>
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
										<h4 class="card-title">Data Jabatan</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddJabatan">
											<i class="fa fa-plus"></i>
											Tambah Data
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Jabatan</th>
													<th>Aksi</th>
												</tr>
											</thead>
											
											<tbody>
												@php $no = 1; @endphp
    											@foreach ($jabatan as $row)
												<tr>
													<td>{{ $no++ }}</td>
													<td>{{ $row->jabatan }}</td>
													<td>
														<a href="#modalEditJabatan{{ $row->id }}" data-toggle="modal" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
														<a href="#modalHapusJabatan{{ $row->id }}" data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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

		<div class="modal fade" id="modalAddJabatan" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-light">
														Jabatan</span> 
														<span class="fw-mediumbold">
															Baru
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="/jabatan/store">
												@csrf
												<div class="modal-body">
													<div class="form-group">
														<label>Nama Jabatan</label>
														<input type="text" name="jabatan" class="form-control" placeholder="Nama Jabatan ..." required="">
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

									@foreach ($jabatan as $d)

									<div class="modal fade" id="modalEditJabatan{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															Jabatan
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="/jabatan/{{ $d->id }}/update">
													@csrf
												<div class="modal-body">
													<div class="form-group">
														<label>Nama Jabatan</label>
														<input type="text" value="{{ $d->jabatan }}" name="jabatan" class="form-control" placeholder="Nama Jabatan ..." required="">
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

									@foreach ($jabatan as $d)

									<div class="modal fade" id="modalHapusJabatan{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Hapus</span> 
														<span class="fw-light">
															Jabatan
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="GET" enctype="multipart/form-data" action="/jabatan/{{ $d->id }}/destroy">
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