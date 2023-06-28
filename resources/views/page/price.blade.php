@extends('landing.master')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center mt-5">
	<h1 class="display-4">Ayo! Gabung</h1>
	<p class="lead">Promosikan usaha kos - kosanmu dengan cepat.</p>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#arahan">
	  	Gimana Daftarnya
	</button>

	<!-- Modal -->
	<div class="modal fade" id="arahan" tabindex="-1" role="dialog" aria-labelledby="arahan" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		     	<div class="modal-header">
			        <h5 class="modal-title" id="arahan">Arahan</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
		     	</div>
		     	<div class="modal-body text-justify" style="padding: 10px 30px">
		        	<ol>
		        		<li>Pertama kamu harus daftar terlebih dahulu dengan memilih paket yang tersedia.</li>
		        		<li>Isi data diri kamu. Setelah itu kirim bukti pembayaran dengan cara mentransfer uang kepada bank BNI atas nama <b>Agung Maulana</b> sesuai paket yang kamu pilih, ke rekening <b>100291212</b>.</li>
		        		<li>Kemudian kamu harus menunggu hingga akunmu di aktifkan dan menerima email dari admin.</li>
		        		<li>Jika masa aktifmu sudah habis sebelum diperpanjang. Maka kosanmu tidak akan ditampilkan</li>
		        	</ol>
		    	</div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Save changes</button>
			    </div>
		    </div>
	  	</div>
	</div>

</div>

<div class="container">
	<div class="card-deck mb-3 text-center">
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">1 Bulan</h4>
			</div>
			<div class="card-body">
				<h3 class="card-title pricing-card-title">Rp. 150.000</h3>
				<button type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#1bulan">Pilih</button>

				<!-- Modal -->
				<div class="modal fade" id="1bulan" tabindex="-1" role="dialog" aria-labelledby="1bulan" aria-hidden="true">
				  	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
					     	<div class="modal-header">
						        <h5 class="modal-title" id="1bulan">Daftar</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
					     	</div>
					     	<form action="{{ route('post.price') }}" method="POST" enctype="multipart/form-data">
					     		@csrf
						     	<div class="modal-body">
						        	<div class="form-group">
									    <label for="nama">Nama usaha kosanmu</label>
									    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama kosan">
								  	</div>

								  	<div class="form-group">
									    <label for="alamat">Alamat usaha kosanmu</label>
									    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat kosan">
								  	</div>

								  	<div class="form-group">
									    <label for="no_telp">Nomor telepon usaha kosanmu</label>
									    <input type="number" name="no_telp" class="form-control" id="no_telp" placeholder="Nomor telepon">
								  	</div>

								  	<div class="form-group">
									    <label for="no_rek">Nomor rekening kamu</label>
									    <input type="number" name="no_rek" class="form-control" id="no_rek" placeholder="Nomor rekening">
								  	</div>

								  	<div class="form-group">
									    <label for="bukti">Bukti pembyaran</label>
									    <input type="file" name="bukti" class="form-control" id="bukti">
								  	</div>

								  	<div class="form-group">
									    <input type="hidden" name="tipe" class="form-control" id="tipe" value="1 Bulan">
								  	</div>
						    	</div>
							    <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        <button type="submit" class="btn btn-primary">Daftar</button>
							    </div>
						    </form>
					    </div>
				  	</div>
				</div>

			</div>
		</div>
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">3 Bulan</h4>
			</div>
			<div class="card-body">
				<h3 class="card-title pricing-card-title">Rp. 400.000</h3>
				<button type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#3bulan">Pilih</button>
			</div>

			<!-- Modal -->
				<div class="modal fade" id="3bulan" tabindex="-1" role="dialog" aria-labelledby="3bulan" aria-hidden="true">
				  	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
					     	<div class="modal-header">
						        <h5 class="modal-title" id="3bulan">Daftar</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
					     	</div>
					     	<form action="{{ route('post.price') }}" method="POST" enctype="multipart/form-data">
					     		@csrf
						     	<div class="modal-body">
						        	<div class="form-group">
									    <label for="nama">Nama usaha kosanmu</label>
									    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama kosan">
								  	</div>

								  	<div class="form-group">
									    <label for="alamat">Alamat usaha kosanmu</label>
									    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat kosan">
								  	</div>

								  	<div class="form-group">
									    <label for="no_telp">Nomor telepon usaha kosanmu</label>
									    <input type="number" name="no_telp" class="form-control" id="no_telp" placeholder="Nomor telepon">
								  	</div>

								  	<div class="form-group">
									    <label for="no_rek">Nomor rekening kamu</label>
									    <input type="number" name="no_rek" class="form-control" id="no_rek" placeholder="Nomor rekening">
								  	</div>

								  	<div class="form-group">
									    <label for="bukti">Bukti pembyaran</label>
									    <input type="file" name="bukti" class="form-control" id="bukti">
								  	</div>

								  	<div class="form-group">
									    <input type="hidden" name="tipe" class="form-control" id="tipe" value="3 Bulan">
								  	</div>
						    	</div>
							    <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        <button type="submit" class="btn btn-primary">Daftar</button>
							    </div>
						    </form>
					    </div>
				  	</div>
				</div>

		</div>
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">6 Bulan</h4>
			</div>
			<div class="card-body">
				<h3 class="card-title pricing-card-title">Rp. 850.000</h3>
				<button type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#6bulan">Pilih</button>
			</div>

			<!-- Modal -->
				<div class="modal fade" id="6bulan" tabindex="-1" role="dialog" aria-labelledby="6bulan" aria-hidden="true">
				  	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
					     	<div class="modal-header">
						        <h5 class="modal-title" id="6bulan">Daftar</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
					     	</div>
					     	<form action="{{ route('post.price') }}" method="POST" enctype="multipart/form-data">
					     		@csrf
						     	<div class="modal-body">
						        	<div class="form-group">
									    <label for="nama">Nama usaha kosanmu</label>
									    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama kosan">
								  	</div>

								  	<div class="form-group">
									    <label for="alamat">Alamat usaha kosanmu</label>
									    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat kosan">
								  	</div>

								  	<div class="form-group">
									    <label for="no_telp">Nomor telepon usaha kosanmu</label>
									    <input type="number" name="no_telp" class="form-control" id="no_telp" placeholder="Nomor telepon">
								  	</div>

								  	<div class="form-group">
									    <label for="no_rek">Nomor rekening kamu</label>
									    <input type="number" name="no_rek" class="form-control" id="no_rek" placeholder="Nomor rekening">
								  	</div>

								  	<div class="form-group">
									    <label for="bukti">Bukti pembyaran</label>
									    <input type="file" name="bukti" class="form-control" id="bukti">
								  	</div>

								  	<div class="form-group">
								  		<input type="date" name="date" class="form-control">
									    <input type="hidden" name="tipe" class="form-control" id="tipe" value="6 Bulan">
								  	</div>
						    	</div>
							    <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        <button type="submit" class="btn btn-primary">Daftar</button>
							    </div>
						    </form>
					    </div>
				  	</div>
				</div>

		</div>
	</div>
</div>
@endsection