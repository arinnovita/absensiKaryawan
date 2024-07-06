@extends('layout')

@section('content')

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Keterangan</h4>
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
								<a href="#">Keterangan</a>
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
										<h4 class="card-title">Data Keterangan</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddKeterangan">
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
													<th>Keterangan</th>
													<th>Aksi</th>
												</tr>
											</thead>
											
											<tbody>
												@php $no = 1; @endphp
    											@foreach ($keterangan as $row)
												<tr>
													<td>{{ $no++ }}</td>
													<td>{{ $row->keterangan }}</td>
													<td>
														<a href="#modalEditKeterangan{{ $row->id }}" data-toggle="modal" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
														<a href="#modalHapusKeterangan{{ $row->id }}" data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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

		<div class="modal fade" id="modalAddKeterangan" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-light">
														Keterangan</span> 
														<span class="fw-mediumbold">
															Baru
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="{{ route('keterangan.store') }}">
												@csrf
												<div class="modal-body">
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" name="keterangan" class="form-control" placeholder="Keterangan ..." required="">
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

									@foreach ($keterangan as $d)

									<div class="modal fade" id="modalEditKeterangan{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															Keterangan
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="{{ route('keterangan.update/{{ $d->id }}') }}">
													@csrf
												<div class="modal-body">
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" value="{{ $d->keterangan }}" name="keterangan" class="form-control" placeholder="Keterangan ..." required="">
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

									@foreach ($keterangan as $d)

									<div class="modal fade" id="modalHapusKeterangan{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Hapus</span> 
														<span class="fw-light">
															Keterangan
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="GET" enctype="multipart/form-data" action="{{ route('keterangan.destroy') }}">
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