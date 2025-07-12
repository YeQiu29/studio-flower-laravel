@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<section class="py-5">
    <div class="container">
        <h1 class="display-4 text-center mb-4">Contact Us</h1>
        <p class="lead text-center">We'd love to hear from you! Please fill out the form below or reach out to us directly.</p>
        
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" placeholder="Subject of your message">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Your message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="text-center mt-5">
            <h3>Our Contact Information</h3>
            <p>Email: <a href="mailto:alisaaulia491@gmail.com">alisaaulia491@gmail.com</a></p>
            <p>Phone: <a href="tel:+62881027003942">+62-881-0270-03942</a></p>
        </div>
    </div>
</section>
@endsection
