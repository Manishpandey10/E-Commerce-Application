@extends('landing_page.layouts.main')
@section('main-container')
    <div class="container">
        <!-- Map Begin -->
        <div class="map">
            <iframe
                src="{{ url('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111551.9926412813!2d-90.27317134641879!3d38.606612219170856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1597926938024!5m2!1sen!2sbd') }}"
                height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <!-- Map End -->

        <!-- Contact Section Begin -->
        <section class="contact spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact__text">
                            <div class="section-title">
                                <span>Information</span>
                                <h2>Contact Us</h2>
                                <p>As you might expect of a company that began as a high-end interiors contractor, we pay
                                    strict attention.</p>
                            </div>
                            <ul>
                                <li>
                                    <h4>India</h4>
                                    <p>Bareilly , Uttar pradesh <br />+91 145221212</p>
                                </li>
                                <li>
                                    <h4>America</h4>
                                    <p>109 Avenue Léon, 63 Clermont-Ferrand <br />+12 345-423-9893</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="contact__form">
                            <form action="{{ route('submit.message') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Name" name="name">
                                        <span id="name" class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="email" placeholder="Email">
                                        <span id="name" class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Message" name= "description"></textarea>
                                        <span id="name" class="text-danger">
                                            @error('description')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mt-7">
                                        <button type="submit" class="site-btn">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Section End -->

    </div>
@endsection
