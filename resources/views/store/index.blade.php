@extends('layouts.store')

@section('title')
    Welcome to B-Shop
@endsection

@section('content')
    <div class="mt-5">
        @include('layouts.include.store.slider')
    </div>
    {{-- Products Slider --}}
    <div class="mt-5 py-5">
        <div class="container-fluid">
            <div class="mx-auto max-w-50">
                <h1 class="text-center py-2">Popular Collections</h1>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam asperiores earum vitae accusantium iusto atque rem, pariatur minima? Atque, modi. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="row">
                <div class="product-slider owl-carousel owl-theme owl-loaded">
                    @foreach ($popular_catalogue  as $item)    
                    <div class="item py-5">
                        <a href="{{ url('details/'.$item->id) }}">
                            <div class="card card-profile">
                                <img src="{{ asset('assets/uploads/products/'.$item->img) }}" alt="Product Image" class="fit-cover from-top card-img-top" height="512">
                                <div class="card-body">
                                    <h1 class="text-center">{{ $item->name }}</h1>
                                    <p class="text-center">{{ $item->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- Products Slider End --}}
    {{-- Teams --}}
    <div class="">
        <div class="container-fluid">
            <div class="py-5 m-auto max-w-50">
                <h1 class="text-center py-2">Our Team</h1>
                <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique assumenda id nam numquam. Modi aspernatur cum optio iure voluptatibus recusandae beatae animi asperiores ducimus libero.</p>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/team1.webp') }}" alt="Product Image" class="rounded-circle" style="height: 100px; width: 100px;">
                            <h4 class="mt-4">Guy Hawkins</h4>
                            <p class="">CEO</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/team2.webp') }}" alt="Product Image" class="rounded-circle" style="height: 100px; width: 100px;">
                            <h4 class="mt-4">Jane Cooper</h4>
                            <p class="">COO</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/team3.webp') }}" alt="Product Image" class="rounded-circle" style="height: 100px; width: 100px;">
                            <h4 class="mt-4">Darrell Steward</h4>
                            <p class="">CTO</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/team4.webp') }}" alt="Product Image" class="rounded-circle" style="height: 100px; width: 100px;">
                            <h4 class="mt-4">Dianne Russell</h4>
                            <p class="">CFO</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Teams End--}}
    {{-- Services --}}
    <div class="mt-5 py-5">
        <div class="container-fluid">
            <div class="py-5 m-auto max-w-50">
                <h4 class="text-center">How it Works</h4>
                <h1 class="text-center py-2">Delivery the best fresh produce to your doorstep</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/member.png') }}" alt="Product Image" class="" style="height: 100px; width: 100px;">
                            <h4 class="mt-5">Become a Member</h4>
                            <p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat necessitatibus deserunt ipsa officiis beatae amet facilis, iste sequi sunt excepturi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/order.png') }}" alt="Product Image" class="" style="height: 100px; width: 100px;">
                            <h4 class="mt-5">Place Your Order</h4>
                            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus dolores rem similique dolorem? Neque ut doloribus veniam, eveniet itaque vel!</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/delivery.png') }}" alt="Product Image" class="" style="height: 100px; width: 100px;">
                            <h4 class="mt-5">Delivery Time</h4>
                            <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam fugit repudiandae totam quidem ex excepturi, voluptate ratione adipisci facere corrupti.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Services End--}}
    {{-- Blog --}}
    <div class="mt-5 py-5">
        <div class="container-fluid">
            <div class="m-auto max-w-50">
                <h4 class="text-center">News & Blog</h4>
                <h1 class="text-center py-2">All the latest news and blog about Gardening</h1>
            </div>
            <div class="row">
                <div class="blog-slider owl-carousel owl-theme owl-loaded">
                    <div class="item py-5">
                        <div class="card rounded-5 border-none">
                            <img src="{{ asset('assets/img/blog1.jpg') }}" alt="Product Image" class="rounded-5 fit-cover from-top card-img-top">
                            <div class="card-body">
                                <h4 class="font-weight-bold">How to do up your garden during the lockdown</h4>
                                <div class="" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <p class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus fugit libero cupiditate architecto beatae veniam? Quos cumque perferendis, modi pariatur voluptas nostrum corrupti asperiores eos maiores neque nam itaque minus vitae inventore delectus nulla suscipit voluptatum culpa soluta accusantium esse! Id exercitationem ullam consequatur quia labore, sed incidunt, cum voluptatem excepturi iure quibusdam totam a? Sed accusamus eos, laborum voluptatem recusandae similique, maxime qui maiores hic neque odio iste nemo ut assumenda soluta voluptatibus adipisci velit placeat non mollitia voluptas officiis id. Eligendi, deserunt quisquam ducimus dolorum, molestiae quaerat velit omnis, laborum perspiciatis ex accusantium sit. Nulla explicabo impedit facilis!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Blog End--}}
    {{-- Jumbrotron --}}
    <div class="my-5" style="height: 800px; width: 100%; padding: 80px;">
        <div style="background-image: url({{ asset('assets/img/jumbotron.jpg') }});  background-size: cover; background-position: bottom; height: 100%; width: 100%; border-radius: 60px;" class="d-flex align-items-start justify-content-center">
            <div style="background-color: rgba(255, 255, 255, 0.8);width: 100%; height: 80%; border-radius: 0px 0px 60px 60px;" class="p-5 max-w-50  d-flex flex-column text-center align-items-center justify-content-around">
                <div>
                    <p class="" style="font-size: 60px; font-weight: bold;">Ready to make your home a greener place?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In animi officiis totam perspiciatis ut nulla, commodi deserunt quis fugit? Saepe repellat odio ipsa? Sapiente dicta quisquam iusto rem animi cumque.</p>
                </div>
                <a class="rounded-5 py-2 px-4 btn btn-success" href="#" role="button">View Catalog Now</a>
            </div>
        </div>
    </div>
    {{-- Jumbrotron end--}}
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $(".blog-slider").owlCarousel({
            loop: true,
            margin: 50,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });

        $(".product-slider").owlCarousel({
            loop: true,
            margin: 50,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
    });
</script>
@endsection