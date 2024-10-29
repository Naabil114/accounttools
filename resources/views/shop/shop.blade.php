@extends('template.tshop')
@section('content')
<section id="featured-books" class="py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="section-header align-center">
						<div class="title">
							<span></span>
						</div>
						<h2 class="section-title">Akun premium</h2>
					</div>

					

						<div class="container-fluid team pb-5 ">
							<div class="container pb-5">
									<div class="row g-4">
										@foreach ($data as $d )
										
										<div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
											<div class="team-item p-4 pt-0">
												<a href="{{url("produkdetail/$d->id_kategori")}}" >
													<div class="team-img">
														
														<img src="{{ asset('storage/kategori/' . $d->foto) }}" class="img-fluid rounded w-100" alt="Image">
													</div>
												</a>
												<div class="team-content pt-4">
													<h4>{{$d->nama}}</h4>
													<p>Plans</p>
													
												</div>
											</div>
										</div>
										@endforeach
											
											
											
									</div>
							</div>
						</div>
					


				</div><!--inner-content-->
			</div>

			
		</div>
	</section>
@endsection