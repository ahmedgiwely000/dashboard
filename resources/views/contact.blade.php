@extends('layouts.user')

@section('content')
    <div class="contact1">
        <div id="message" class="message alert alert-text text-center p-3 font-weight-bold text-success"></div>
        {{-- @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>
        @endif --}}
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/img-01.png" alt="IMG">
			</div>
            <form enctype="multipart/form-data" action="/contact" method="POST" autocomplete="off" class="contact1-form validate-form">
				<span class="contact1-form-title">
					Get in touch
                </span>
                @csrf
				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" id="name" type="text" name="name" placeholder="Name">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input1" type="text" id="email" name="email" placeholder="Email">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1" type="text" id="subject" name="subject" placeholder="Subject">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Message is required">
					<textarea class="input1" name="message" id="message_in" placeholder="Message"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button id="send_email_button" class="contact1-form-btn">
						<span>
							Send Email
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection

