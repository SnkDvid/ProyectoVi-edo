@extends('frontend.home.layouts.master')

@section('content')
    <!--==========================
      PRODUCT MODAL VIEW START
    ===========================-->
    
    <!--==========================
      PRODUCT MODAL VIEW END
    ===========================-->


    <!--============================
        BANNER PART 2 START
    ==============================-->
        @include('frontend.home.home.sections.banner-slider')
    <!--============================
        BANNER PART 2 END
    ==============================-->


    <!--============================
        FLASH SELL START
    ==============================-->
   <!-- @include('frontend.home.home.sections.flash-sale') -->
    <!--============================
        FLASH SELL END
    ==============================-->


    <!--============================
       MONTHLY TOP PRODUCT START
    ==============================-->
    <!-- @include('frontend.home.home.sections.top-category-product') -->
    <!--============================
       MONTHLY TOP PRODUCT END
    ==============================-->


    <!--============================
        BRAND SLIDER START
    ==============================-->
    <!--@include('frontend.home.home.sections.brand-slider')-->
    <!--============================
        BRAND SLIDER END
    ==============================-->


    <!--============================
        HOT DEALS START
    ==============================-->
    <!--@include('frontend.home.home.sections.hot-deals')-->
    <!--============================
        HOT DEALS END  
    ==============================-->


    <!--============================
        ELECTRONIC PART START  
    ==============================-->
    @include('frontend.home.home.sections.category-product-slider-one')
    <!--============================
        ELECTRONIC PART END  
    ==============================-->

     <!--============================
        SINGLE BANNER START
    ==============================-->
    @include('frontend.home.home.sections.single-banner')
    <!--============================
        SINGLE BANNER END  
    ==============================-->

    <!--============================
        ELECTRONIC PART START  
    ==============================-->
    <!--@include('frontend.home.home.sections.category-product-slider-two')-->
    <!--============================
        ELECTRONIC PART END  
    ==============================-->


    <!--============================
        LARGE BANNER  START  
    ==============================-->
    <!--@include('frontend.home.home.sections.large-banner')-->
    <!--============================
        LARGE BANNER  END  
    ==============================-->


    <!--============================
        WEEKLY BEST ITEM START  
    ==============================-->
    <!--@include('frontend.home.home.sections.weekly-best-item')-->
    <!--============================
        WEEKLY BEST ITEM END 
    ==============================-->


    <!--============================
      HOME SERVICES START
    ==============================-->
    @include('frontend.home.home.sections.services')
    <!--============================
        HOME SERVICES END
    ==============================-->


    <!--============================
        HOME BLOGS START
    ==============================-->
    <!--@include('frontend.home.home.sections.blog')-->
    <!--============================
        HOME BLOGS END
    ==============================-->
@endsection