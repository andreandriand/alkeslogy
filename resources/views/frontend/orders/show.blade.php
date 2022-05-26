@extends('layouts.frontend')
@section('title', 'Order - ' . $order->code)
@section('content')
<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('frontend/assets/img/bg/breadcrumb.jpg') }})">
	<div class="container-fluid">
		<div class="breadcrumb-content text-center">
			<h2>Wishlist Kamu</h2>
			<ul>
				<li><a href="{{ url('/') }}">Beranda</a></li>
				<li>Wishlist Kamu</li>
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
						<li><a href="{{ url('profile') }}">Profil</a></li>
						<li><a href="{{ url('orders') }}">Pesanan</a></li>
						<li><a href="{{ url('favorites') }}">Wishlist</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="d-flex justify-content-between">
					<h2 class="text-dark font-weight-medium">ID Pesanan #{{ $order->code }}</h2>
				</div>
				<div class="row pt-5">
					<div class="col-xl-4 col-lg-4">
						<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Penerima</p>
						<address>
							{{ $order->customer_first_name }} {{ $order->customer_last_name }}
							<br> {{ $order->customer_address1 }}
							<br> {{ $order->customer_address2 }}
							<br> Email: {{ $order->customer_email }}
							<br> Phone: {{ $order->customer_phone }}
							<br> Postcode: {{ $order->customer_postcode }}
						</address>
					</div>
					@if ($order->shipment)
					<div class="col-xl-4 col-lg-4">
						<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Alamat Pengiriman</p>
						<address>
							{{ $order->shipment->first_name }} {{ $order->shipment->last_name }}
							<br> {{ $order->shipment->address1 }}
							<br> {{ $order->shipment->address2 }}
							<br> Email: {{ $order->shipment->email }}
							<br> Phone: {{ $order->shipment->phone }}
							<br> Postcode: {{ $order->shipment->postcode }}
						</address>
					</div>
					@endif
					<div class="col-xl-4 col-lg-4">
						<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Detail</p>
						<address>
							ID: <span class="text-dark">#{{ $order->code }}</span>
							<br> {{ $order->order_date }}
							<br> Status: {{ $order->status }} {{ $order->isCancelled() ? '('. $order->cancelled_at .')' : null}}
							@if ($order->isCancelled())
							<br> Cancellation Note : {{ $order->cancellation_note}}
							@endif
							<br> Payment Status: {{ $order->payment_status }}
							<br> Shipped by: {{ $order->shipping_service_name }}
						</address>
					</div>
				</div>
				<div class="table-content table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Item</th>
								<th>Deskripsi</th>
								<th>Qty</th>
								<th>Harga Satuan</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($order->orderItems as $item)
							<tr>
								<td>{{ $item->sku }}</td>
								<td>{{ $item->name }}</td>
								<td>{{ $item->weight }} (gram)</td>
								<td>{{ $item->qty }}</td>
								<td>Rp.{{ number_format($item->base_price) }}</td>
								<td>Rp.{{ number_format($item->sub_total) }}</td>
							</tr>
							@empty
							<tr>
								<td colspan="6">Pesanan Tidak Ditemukan!</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection