@extends('layout.master_layout')
@section('head')
@parent
@endsection
@section('content')
<!--breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="{{route('home')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">About us</li>
        </ol>
    </div>
</div>
<!--//breadcrumbs-->
<!--about-->
<div class="about">
    <div class="container">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
            <h3 class="title">About<span> Us</span></h3>
            <p>We are ASSP07 Team</p>
        </div>
        <!--new-->
        <div class="new">
            <div class="container text-center">
                <div class="new-info">
                    <div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay=".5s">
                        <div class="new-top">
                            <a href="#"><img src="{{asset('images/author/duchoi.jpg')}}" class="img-responsive" alt=""/></a>
                        </div>
                        <div class="new-bottom">
                            <h5><a class="name" href="single.html">Nguyen Duc Hoi</a></h5>
                        </div>
                    </div>
                    <div class="col-md-3 new-grid new-mdl simpleCart_shelfItem wow flipInY animated" data-wow-delay=".7s">
                        <div class="new-top">
                            <a href="#"><img src="{{asset('images/author/duytuan.jpg')}}" class="img-responsive" alt=""/></a>
                        </div>
                        <div class="new-bottom">
                            <h5><a class="name" href="#">Nguyen Duy Tuan</a></h5>
                        </div>
                    </div>
                    <div class="col-md-3 new-grid new-mdl1 simpleCart_shelfItem wow flipInY animated" data-wow-delay=".9s">
                        <div class="new-top">
                            <a href="#"><img src="{{asset('images/author/quangvu.jpg')}}" class="img-responsive" alt=""/></a>
                        </div>
                        <div class="new-bottom">
                            <h5><a class="name" href="#">Ha Quang Vu</a></h5>
                        </div>
                    </div>
                    <div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay="1.1s">
                        <div class="new-top">
                            <a href="single.html"><img src="{{asset('images/author/thanhtung.jpg')}}" class="img-responsive" alt=""/></a>
                        </div>
                        <div class="new-bottom">
                            <h5><a class="name" href="single.html">Tran Thanh Tung</a></h5>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>      
        <!--//new-->

    </div>
</div>
<!--//about-->

@endsection