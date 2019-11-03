@extends('layouts.app')

@section('content')
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
	  	<div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form id="creditForm">
		  @csrf
		  <div class="modal-body">
			{{-- <label for="card">Accepted Cards</label>
			<div id="card" class="">
				<i class="fa fa-cc-visa" style="color:navy;"></i>
				<i class="fa fa-cc-amex" style="color:blue;"></i>
				<i class="fa fa-cc-mastercard" style="color:red;"></i>
				<i class="fa fa-cc-discover" style="color:orange;"></i>
			</div> --}}
			<div class="form-group">
				<label for="cname" class="col-form-label">Name on Card</label>
				<input type="text" class="form-control" id="cname" name="cname" placeholder="John More Doe">
			</div>
			<div class="form-group">
				<label for="ccnum" class="col-form-label">Credit card number</label>
				<input type="text" class="form-control" id="ccnum" name="ccnum" placeholder="1111-2222-3333-4444">
			</div>
			<div class="form-group">
				<label for="expdate" class="col-form-label">Exp Date</label>
				<input type="text" class="form-control" id="expdate" name="expdate"  placeholder="YYYY/MM/DD">
			</div>
			<div class="form-group">
				<label for="cvv" class="col-form-label">CVV</label>
				<input type="text" class="form-control" id="cvv" name="cvv" placeholder="985">
			</div>
			<div class="alert alert-danger print-error-msg" style="display:none">
        		<ul></ul>
    		</div>
		  </div>	  
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-info">Submit</button>
		  </div>
		</form>
		</div>
		</div>
  	</div>
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Planing Trip To Anywhere in The World?</h1>
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<h3>Book Your Trip</h3>
											<form class="probootstrap-form" id="BookingForm">
												
												{{-- <p class="alert alert-success" id="success"></p> --}}
												<input type="hidden" id="flight_id" display="none" name="flight_id">
												<input type="hidden" name="credit_id" id="creditId" display="none">
												<div class="form-group">
													<div class="row mb-3">
														{{-- from --}}
														<div class="col-md">
														<div class="form-group">
															<label for="id_label_single2">From</label>
															<div class="probootstrap_select-wrap">
															<select class="js-example-basic-single js-states form-control dynamic" data-dependent="to" name="from" style="width: 100%;" id="from" >
																<option value="">Select from</option>
																@foreach ($country_list as $country)
																	<option value="{{$country->from}}">{{$country->from}}</option>
																@endforeach														
															</select>
															</div>
														</div>
														</div>
														{{-- to --}}
														<div class="col-md">
															<div class="form-group">
																<label for="id_label_single2">to</label>
																<div class="probootstrap_select-wrap">
																<select class="js-example-basic-single js-states form-control dynamic" data-dependent="departure_date" name="to" style="width: 100%;" id="to" >
																	<option value="">Select to</option>															
																</select>
																</div>
															</div>
														</div>
														{{-- departure date --}}
														<div class="col-md">
															<div class="form-group">
																<label for="id_label_single2">departure_date</label>
																<div class="probootstrap_select-wrap">
																<select class="js-example-basic-single js-states form-control dynamic" data-dependent="time" name="departure_date" style="width: 100%;" id="departure_date" >
																	<option value="">Select departure_date</option>															
																</select>
																</div>
															</div>
														</div>
														{{-- time --}}
														<div class="col-md">
															<div class="form-group">
																<label for="id_label_single2">time</label>
																<div class="probootstrap_select-wrap">
																<select class="js-example-basic-single js-states form-control dynamic" data-dependent="arrival_date" name="time" style="width: 100%;" id="time" >
																	<option value="">Select time</option>															
																</select>
																</div>
															</div>
														</div>
														{{-- arrival date --}}
														<div class="col-md">
															<div class="form-group">
																<label for="id_label_single2">arrival_date</label>
																<div class="probootstrap_select-wrap">
																<select class="js-example-basic-single js-states form-control dynamic" data-dependent="price" name="arrival_date" style="width: 100%;" id="arrival_date" >
																	<option value="">Select arrival_date</option>															
																</select>
																</div>
															</div>
														</div>
														{{-- price --}}
														<div class="col-md">
															<div class="form-group">
																<label for="id_label_single2">price</label>
																<div class="probootstrap_select-wrap">
																<select class="js-example-basic-single js-states form-control" name="price" style="width: 100%;" id="price" >
																	<option value="">Select price</option>															
																</select>
																</div>
															</div>
														</div>
														<div class="col-md">

															<!-- <button type="button" class="btn btn-primary btn-block" id="Book">Book</button> -->

															<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal">Book Now</button>
														</div>
														
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section" id="trips">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Most Popular Destination</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/img_1.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_1.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>New York, USA</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/img_2.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_2.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Seoul, South Korea</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/img_3.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_3.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Paris, France</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>


				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/img_4.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_4.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Sydney, Australia</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/img_5.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_5.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Greece, Europe</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/img_6.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_6.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Spain, Europe</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>

			</div>
		</div>
	</div>

	<div class="gtco-cover gtco-cover-sm" style="background-image: url(images/img_bg_1.jpg)"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container text-center">
			<div class="display-t">
				<div class="display-tc">
					<h1>We have high quality services that you will surely love!</h1>
				</div>	
			</div>
		</div>
	</div>

	<div id="gtco-counter" class="gtco-section">
		<div class="gtco-container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Our Success</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="196" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Destination</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Hotels</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="12402" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Travelers</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="12202" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Happy Customer</span>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection



@section('script')

	<script>
		

			$('.dynamic').change(function(){
				if($(this).val() !=''){
					var select = $(this).attr('id');
					var value = $(this).val();
					var dependent = $(this).data('dependent');
					var _token = $('input[name="_token"]').val();
					$.ajax({
						url:"{{route('index.fetch')}}",
						method:"post",
						data:{select:select, value:value, _token:_token, dependent:dependent},
						success:function(result){
							$('#'+dependent).html(result);
						}
					});
				};
			});


			$('#departure_date').on('change', function () {
				let departure_date = $(this).val();
				let to = $('#to').val();
				let from = $('#from').val();
				$.get('{{route("returnFlight")}}?from='+from+'&to='+to+'&departure_date='+departure_date, function(res){
					
					$('#flight_id').val(res.id);
				})

			});


			

			$('#creditForm').submit(function(e){
				
				$.ajax({
					url: "{{ route('store') }}",
					method: 'POST',
					data: {
						_token:$("input[name='_token']").val(),
						'cname':$('#cname').val(),
						'ccnum':$('#ccnum').val(),
						'expdate':$('#expdate').val(),
						'cvv':$('#cvv').val(),
						'flight_id': $('#flight_id').val()
					},
					dataType: 'json',
					success: function(data){

						$('#exampleModal').modal('hide');
							
						$('#from').val('');
						$('#to').val('');
						$('#departure_date').val('');
						$('#time').val('');
						$('#arrival_date').val('');
						$('#price').val('');

					},

					error: function(err){

						if(err.status == 422){

							printErrorMsg(err.responseJSON);
						}
					}

				});			
					

				e.preventDefault();

			});


			function printErrorMsg (msg) {
	            $(".print-error-msg").find("ul").html('');
	            $(".print-error-msg").css('display','block');
	            $.each(msg, function(key, value ) {
	               for(let i = 0; i<Object.keys(msg).length; i++){
	               		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
	               }
	            });
        	}

		
	</script>
	
	 
 @endsection