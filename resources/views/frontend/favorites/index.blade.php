@extends('layouts.frontend')
@section('title', 'Favorite Items')
@section('content')
<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('frontend/assets/img/bg/breadcrumb.jpg') }})">
	<div class="container-fluid">
		<div class="breadcrumb-content text-center">
			<h2>Wishlist Saya</h2>
			<ul>
				<li><a href="{{ url('/') }}">Beranda</a></li>
				<li>Wishlist Saya</li>
			</ul>
		</div>
	</div>
</div>
<div class="shop-page-wrapper shop-page-padding ptb-100">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3">
				<h3 class="sidebar-title">Menu</h3>
				<div class="sidebar-categories">
					<ul>
						<li><a href="{{ route('profile.index') }}">Profil</a></li>
						<li><a href="{{ route('orders.index') }}">Pesanan</a></li>
						<li><a href="{{ route('favorite.index') }}">Wishlist</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="shop-product-wrapper res-xl">
					<div class="table-content table-responsive">
						<table>
							<thead>
								<tr>
									<th>Hapus</th>
									<th>Gambar</th>
									<th>Produk</th>
									<th>Harga</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($favorites as $favorite)
								@php
								$product = $favorite->product;
								@endphp
								<tr>
									<td class="product-remove">
										<form id="delete-fav" action="{{ route('favorite.destroy', $favorite->id)}}" method="POST" class="d-none">
											@csrf
											@method('delete')
										</form>
										<a href="" onclick="event.preventDefault();document.getElementById('delete-fav').submit();" class="delete"><i class="pe-7s-close"></i></a>
									</td>
									<td class="product-thumbnail">
										<a href="{{ route('product.show', $product->slug) }}">
											@if($product->firstMedia)
											<img src="{{ asset('storage/images/products/' . $product->firstMedia->file_name) }}" width="60" height="60" alt="{{ $product->name }}">
											@else
											<span class="badge badge-danger">Tidak Ada Gambar</span>
											@endif
										</a>
									</td>
									<td class="product-name"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></td>
									<td class="product-price-cart"><span class="amount">{{ number_format($product->price) }}</span></td>
								</tr>
								@empty
								<tr>
									<td colspan="4">Oops kamu belum nambahin wishlist nih..</td>
								</tr>
								@endforelse
							</tbody>
						</table>
						{{ $favorites->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection