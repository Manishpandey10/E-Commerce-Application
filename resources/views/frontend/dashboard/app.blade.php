@extends('frontend.layouts.main')
@section('main-container')
    <div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid py-2 mt-7">
                        <div class="row">
                            <div class="ms-3">
                                @include('components.global-message')
                                <h3 class="mb-0 h4 font-weight-bolder">Welcome to your
                                    Dashboard, <strong>{{ Auth::user()->username }}</strong></h3>
                                <h3 class="mb-0 h4 font-weight-bolder">Email Id : <strong>{{ Auth::user()->email }}</strong>
                                </h3>
                                <button id="button" class="btn btn-info btn-sm">Animation button</button>
                                <button id="stop" class="btn btn-info btn-sm">Stop animation button</button>
                                <p id="p1" class="mb-4 mt-4">
                                    Check the sales, value and bounce rate by country.
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi dolorum soluta maxime non
                                    quidem minus adipisci sapiente quaerat hic laboriosam quibusdam placeat, beatae iste
                                    labore numquam nam perspiciatis, recusandae enim!
                                </p>
                                <p id="p2" class="mb-4">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur inventore possimus
                                    tempore id quis veritatis esse doloribus quisquam, ut alias, architecto blanditiis
                                    aspernatur provident voluptatem enim, natus doloremque quidem accusantium?
                                </p>
                                <p id='p3' class="mb-4">

                                    laaaaaaaaaaaaaaaaaaaaaaaaaaaalllllllllllllllllllllllllllaaaaaaaaaaaaaaaaaaaaaaaaa?
                                </p>
                                <p id='p4' value="paragraph number 4" class="mb-4">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur inventore possimus
                                    tempore id quis veritatis esse doloribus quisquam, ut alias, architecto blanditiis
                                    aspernatur provident voluptatem enim, natus doloremque quidem accusantium?
                                </p>
                                <p id='p5' class="mb-4">
                                    Double click to toggle class in this paragraph. inspect element to see effects
                                </p>

                            </div>



                        </div>
                    </div>
                    @push('scripts')
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                // $('p').css('color','green');
                                $('#button').click(function() {
                                    $('p')
                                    .animate(
                                        {
                                        height: 'toggle'
                                        },
                                     3000)
                                    .css('color', 'green')
                                    
                                    // $('p').fadeToggle(2000, function(){
                                    // $('p').slideToggle(800, function(){
                                    //     $('p').css('color','blue');
                                    // });
                                    // $('p').css('color','red');
                                    // setTimeout(function(){
                                    //     $('p').css('color','blue')
                                    // },3000);
                                });
                                $('#stop').click(function() {
                                    $('p').stop()
                                    setTimeout(function(){
                                        $('p').css('color','red')
                                    },'fast');
                                });

                                // $('#p3').mouseover(function()
                                // {
                                //     $(this).css('color','cyan')
                                // }).mouseleave(function(){
                                //     $(this).css('color','black');
                                // });
                                // });
                                $("#p4").dblclick(function() {
                                    $("#p4").text('Number 4 paragraph');
                                });
                                $('#p5').dblclick(function() {
                                    $('#p5').toggleClass("paragraph");
                                });
                                $('#p5').after('<p>paragrah inserted here is appended using after function !!!!</p>');
                                $('#p1').after('<p>paragrah inserted here is appended using before function !!!!</p>');

                            });
                        </script>
                    @endpush
                @endsection
