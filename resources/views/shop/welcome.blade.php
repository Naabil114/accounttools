@extends('template.tshop')
@section('content')



<section id="billboard">

		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<button class="prev slick-arrow">
						<i class="icon icon-arrow-left"></i>
					</button>

					<div class="main-slider pattern-overlay" id="home">
						<div class="slider-item">
							<div class="banner-content small">
								<h2 class="banner-title">Netflix Premium</h2>
								<p>Netflix menawarkan pengalaman menonton film bioskop terbaru dan video eksklusif yang nggak bisa kamu temukan di platform lain. Jika kamu penggemar film dan drama dengan kualitas produksi tinggi, Netflix adalah aplikasi nonton film yang harus kamu coba.</p>
								<div class="btn-wrap">
									<!-- <a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i
											class="icon icon-ns-arrow-right"></i></a> -->
								</div>
							</div><!--banner-content-->
							<img src="{{asset('booksaw/images/netflixs.png')}}" alt="banner" class="banner-image">
						</div><!--slider-item-->

						<div class="slider-item">
							<div class="banner-content small">
								<h2 class="banner-title">YouTube Premium</h2>
								<p>YouTube lebih dari TV, Reza arab otakvian reper ganteng idaman</p>
								<div class="btn-wrap">
									
								</div>
							</div><!--banner-content-->
							<img src="{{asset('booksaw/images/yt.png')}}" alt="banner" class="banner-image">
						</div><!--slider-item-->
						<div class="slider-item">
							<div class="banner-content small">
								<h2 class="banner-title">MOVIEzone</h2>
								<p>Movizone adalah salah satu solusi terbaik buat kamu yang mencari aplikasi nonton film yang menawarkan tayangan mulai dari olahraga, film bioskop terbaru, hingga drama Korea. Sebagai salah satu apk nonton legal, MOVIEzone menawarkan berbagai paket berlangganan yang bisa disesuaikan dengan kebutuhan kamu loh!</p>
								<div class="btn-wrap">
									
								</div>
							</div><!--banner-content-->
							<img src="{{asset('booksaw/images/moviezone.png')}}" alt="banner" class="banner-image">
						</div><!--slider-item-->
						<div class="slider-item">
							<div class="banner-content small">
								<h2 class="banner-title">Disney+</h2>
								<p>Sudah bener" gatau mau ngapaian dan mau apa udah nga habis pikri</p>
								<div class="btn-wrap">
									
								</div>
							</div><!--banner-content-->
							<img src="{{asset('booksaw/images/disnep.png')}}" alt="banner" class="banner-image">
						</div><!--slider-item-->
						
						<div class="slider-item">
							<div class="banner-content small">
								<h2 class="banner-title">Vidio Premium</h2>
								<p>Vidio adalah platform yang sangat populer di Indonesia, nggak cuma film bioskop terbaru tapi juga live sports, dan berbagai acara TV ada di Vidio. Aplikasi nonton film gratis ini terus menambah koleksinya dengan drama Korea terbaru dan tayangan populer lainnya, menjadikannya salah satu apk nonton legal favorit di Indonesia.</p>
								<div class="btn-wrap">
									
								</div>
							</div><!--banner-content-->
							<img src="{{asset('booksaw/images/vidio.png')}}" alt="banner" class="banner-image">
						</div><!--slider-item-->

					</div><!--slider-->

					<button class="next slick-arrow">
						<i class="icon icon-arrow-right"></i>
					</button>

				</div>
			</div>
		</div>

	</section>

	

	

	

	

	

	

	

	

	

@endsection