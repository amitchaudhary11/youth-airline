@extends('layouts.app')

@section('title')
    Youth Airline
@endsection

@section('content')
<div class="container">
	<div class="row py-5">

				<div class="col-md-6 col-12">
					<h3 style="color: #0f4473;">Get In Touch</h3>
					<form action="/send-mail" method="post" class="py-3">
					@csrf

					@if(request('msg') == 'successfull')
                    <div class="alert bg-success">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <strong>Sent Successfully</strong>
                    </div>
                    @endif
						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="name">Name</label>
								<input type="text" name="firstname" id="name" class="form-control" placeholder="Your firstname" value="{{ old('firstname') }}" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="email">Email</label>
								<input type="text" name="email" id="email" class="form-control" placeholder="Your email address" value="{{ old('email') }}" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="subject">Subject</label>
								<input type="text" name="subject" id="subject" class="form-control" placeholder="Your subject of this message" value="{{ old('subject') }}" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="message">Message</label>
								<textarea name="message" id="message" cols="30" rows="9" class="form-control" placeholder="Write us something" required>{{ old('message') }}</textarea>
							</div>
						</div>
						<div class="form-group">
						<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;&nbsp;Send Message</button>
						</div>

					</form>
				</div>
				<div class="col-md-5 offset-lg-1 col-12">

					<div>
						<h3 style="color: #0f4473;">Contact Information</h3>
						<ul class="list-unstyled">
							<li class="address py-3 text-muted" style="font-size: 16px;"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Rangshala Road, <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nepalgunj - 08, Banke, Nepal</li>
							<li class="phone py-3"><a class="text-info text-muted text-decoration-none" href="#" style="font-size: 16px;"><i class="fa fa-phone fa-lg" aria-hidden="true"></i>&nbsp;&nbsp; + 977 9837283729</a></li>
							<li><a class="text-info text-muted text-decoration-none" href="#" style="font-size: 16px;"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i>&nbsp;&nbsp; nepalairline@gmail.com</a></li>
						</ul>
					</div>
                </div>
	</div>
</div>

@endsection
