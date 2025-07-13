@extends('layouts.app')

@section('title', 'Contact Us')

@section('styles')
<style>
    .btn-custom-bright {
        background-color: #007bff; /* A more vibrant blue */
        border-color: #007bff;
    }
    .btn-custom-bright:hover {
        background-color: #0056b3; /* Slightly darker on hover for effect */
        border-color: #0056b3;
    }
</style>
@endsection

@section('content')
<section class="py-5 pt-header-offset">
    <div class="container">
        <h1 class="display-4 text-center mb-4">Contact Us</h1>
        <p class="lead text-center">We'd love to hear from you! Please fill out the form below or reach out to us directly.</p>
        
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject of your message" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom-bright">Submit</button>
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
