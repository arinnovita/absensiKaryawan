@extends('layout')

@section('content')

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Absen</h4>
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
								<a href="#">Absen</a>
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
										<h4 class="card-title">Data Absen</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddAbsen">
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
													<th>Nama Karyawan</th>
													<th>Waktu</th>
													<th>Keterangan</th>
												</tr>
											</thead>
											
											<tbody>
												@php $no = 1; @endphp
    											@foreach ($absen as $row)
												<tr>
													<td>{{ $no++ }}</td>
													<td>{{ $row->nama_karyawan }}</td>
													<td>{{ $row->waktu_absen }}</td>
													<td>{{ $row->keterangan }}</td>
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

		<div class="modal fade" id="modalAddAbsen" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-light">
														Absen</span> 
														<span class="fw-mediumbold">
															Baru
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="{{ route('absen.store') }}">
												@csrf
												<div class="modal-body">
													<div class="form-group">
														<label>Nama Karyawan</label>
														<select class="form-control" name="karyawan_id" required="">
															<option value="" hidden="">-- Pilih Karyawan --</option>
															@foreach($karyawan as $c)
																<option value="{{ $c->id }}">{{ $c->nama_karyawan }}</option>
															@endforeach
														</select>
													</div>

													<div class="form-group">
														<label>Keterangan Absen</label>
														<select class="form-control" name="keterangan" required="">
															<option value="" hidden="">-- Pilih Keterangan Absen --</option>
															@foreach($keterangan as $row)
																<option value="{{ $row->id }}">{{ $row->keterangan }}</option>
															@endforeach
														</select>
													</div>

													<div class="form-group">
														<label>Waktu Absen</label>
														<input type="time" name="waktu_absen" class="form-control" required="">
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
@endsection