@extends('layouts.frontend')
@section('title', 'User Profile')
@section('content')
<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('frontend/assets/img/bg/breadcrumb.jpg') }})">
	<div class="container-fluid">
		<div class="breadcrumb-content text-center">
			<h2>Profil Kamu</h2>
			<ul>
				<li><a href="#">Beranda</a></li>
				<li>Profil</li>
			</ul>
		</div>
	</div>
</div>
<div class="shop-page-wrapper shop-page-padding ptb-100">
	<div class="container-fluid">
		@if(session()->has('message'))
		<div class="alert alert-success">
			{{ session()->get('message') }}
		</div>
		@endif
		<div class="row">
			<div class="col-lg-3">
				<h3 class="sidebar-title">Menu</h3>
				<div class="sidebar-categories">
					<ul>
						<li><a href="{{ url('profile') }}">Profil</a></li>
						<li><a href="{{ url('orders') }}">Pesanan</a></li>
						<li><a href="{{ url('favorites') }}">Wishlist</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="login">
					<div class="login-form-container">
						<div class="login-form">
							<form action="{{ route('profile.update') }}" method="post">
								@csrf
								@method('put')
								<div class="form-group row">
									<div class="col-md-12">
										<label for="username">Username</label>
										<input type="text" name="username" value="{{ auth()->user()->username }}">
										@error('username')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<label for="first_name">Nama Depan</label>
										<input type="text" name="first_name" value="{{ auth()->user()->first_name }}">
										@error('first_name')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="col-md-6">
										<label for="last_name">Nama Belakang</label>
										<input type="text" name="last_name" value="{{ auth()->user()->last_name }}">
										@error('last_name')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<label for="address1">Alamat</label>
										<textarea name="address1" rows="5">{{ auth()->user()->address1 }}</textarea>
										@error('address1')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<label for="address2">Detail Alamat (gang, apartemen, no rumah, dll)</label>
										<textarea name="address2" rows="5">{{ auth()->user()->address2 }}</textarea>
										@error('address2')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-6">
										<label>Provinsi<span class="required">*</span></label>
										<select name="province_id" id="province-id" value="{{ auth()->user()->province_id }}">
											<option value="">- Please Select -</option>
											@foreach($provinces as $province => $pro)
											<option {{ auth()->user()->province_id == $province ? 'selected' : null }} value="{{ $province }}">{{ $pro }}</option>
											@endforeach
										</select>
										@error('province_id')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="col-md-6">
										<label>Kota<span class="required">*</span></label>
										<select name="city_id" id="city-id" value="{{ auth()->user()->city_id }}">
											@foreach($cities as $city => $ty)
											<option {{ auth()->user()->city_id == $city ? 'selected' : null }} value="{{ $city }}">{{ $ty }}</option>
											@endforeach
										</select>
										@error('city_id')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-6">
										<label>Kode Pos <span class="required">*</span></label>
										<input type="number" name="postcode" placeholder="PostalCode..." value="{{ auth()->user()->postcode }}">
										@error('postcode')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="col-md-6">
										<label>Telepon <span class="required">*</span></label>
										<input type="number" name="phone" placeholder="Phone..." value="{{ auth()->user()->phone }}">
										@error('phone')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<label>Email </label>
										<input type="text" name="email" placeholder="Email..." value="{{ auth()->user()->email}}">
										@error('email')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>
								<div class="button-box">
									<button type="submit" class="default-btn floatright">Ubah Profil</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- register-area end -->
@endsection