@extends('layouts.frontend')
@section('title', 'Order Detail')
@section('content')
<!-- header end -->
<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('frontend/assets/img/bg/breadcrumb.jpg') }})">
	<div class="container">
		<div class="breadcrumb-content text-center">
			<h2>Pesanan Diterima</h2>
			<ul>
				<li><a href="{{ url('/') }}">Beranda</a></li>
				<li>Pesanan Diterima</li>
			</ul>
		</div>
	</div>
</div>
<!-- checkout-area start -->
<div class="cart-main-area  ptb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1 class="cart-heading">Pesanan Kamu :</h4>
					<div class="row">
						<div class="col-xl-3 col-lg-4">
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
						<div class="col-xl-3 col-lg-4">
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
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Detail</p>
							<address>
								Invoice ID:
								<span class="text-dark">#{{ $order->code }}</span>
								<br> {{ date('d M Y H:i:s', strtotime($order->order_date)) }}
								<br> Status: {{ $order->status }}
								<br> Payment Status: {{ $order->payment_status }}
								<br> Shipped by: {{ $order->shipping_service_name }}
							</address>
						</div>
					</div>
					<div class="table-content table-responsive">
						<table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Kode</th>
									<th>Nama Produk</th>
									<th>Qty</th>
									<th>Harga Satuan</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($order->orderItems as $item)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $item->weight }} (gram)</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item->qty }}</td>
									<td>Rp.{{ number_format($item->base_price) }}</td>
									<td>Rp.{{ number_format($item->sub_total) }}</td>
								</tr>
								@empty
								<tr>
									<td colspan="6">Item Pesanan Tidak Ditemukan</td>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-5 ml-auto">
							<div class="cart-page-total">
								<ul>
									<li> Subtotal
										<span>Rp.{{ number_format($order->base_total_price) }}</span>
									</li>
									<li>PPN (10%)
										<span>Rp.{{ number_format($order->tax_amount) }}</span>
									</li>
									<li>Ongkos Kirim
										<span>Rp.{{ number_format($order->shipping_cost) }}</span>
									</li>
									<li>Total
										<span>Rp.{{ number_format($order->grand_total) }}</span>
									</li>
								</ul>
								@if (!$order->isPaid())
								<a href="{{ $order->payment_url }}">Lanjutkan Pembayaran</a>
								@endif
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection