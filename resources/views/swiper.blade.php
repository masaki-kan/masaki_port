<div class="container">
<div id="slider" class="swiper-container">
  <div class="swiper-wrapper">
    @foreach( $address->MapListImages as $image )
    <div class="swiper-slide"><img src="/storage/mapimage/{{ $image->gallery }}" alt="{{ $image->gallery }}"></div>
    @endforeach
  </div>
  <div class="swiper-button-prev swiper-button-white"></div>
  <div class="swiper-button-next swiper-button-white"></div>
</div>

<div id="thumbs" class="swiper-container mb60">
  <div class="swiper-wrapper swiper-wrapper-2">
    @foreach( $address->MapListImages as $image )
    <div class="swiper-slide"><img src="/storage/mapimage/{{ $image->gallery }}" alt="{{ $image->gallery }}"></div>
    @endforeach
  </div>
</div>
</div>
<style type="text/css">
.container{
  width: 100%;
  display: block;
  margin: 0 auto;
  padding: 0;

}
  .mb60{
  }
  .swiper-container{
    text-align: center;
  }
  .swiper-container .swiper-slide img{
    width: 300px;
    display: flex;
    margin: 0 auto;
  }
  .swiper-container .swiper-wrapper-2 img{
    max-width: 100%;
    width: 100%;
    object-fit: contain;
  }
  .prettyprint{
    border: none;
    background: #fafafa;
    color: #697d86;
  }
  #thumbs {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }
    #thumbs .swiper-slide {
        width: 20%;
        height: 100%;
        opacity: 0.2;
        cursor: pointer;
    }
    #thumbs .swiper-slide-active {
        opacity: 1;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
<script>
var slider = new Swiper ('#slider', {
  nextButton: '.swiper-button-next',
  prevButton: '.swiper-button-prev'
})
var thumbs = new Swiper('#thumbs', {
  centeredSlides: true,
  spaceBetween: 10,
  slidesPerView: "auto",
  touchRatio: 0.2,
  slideToClickedSlide: true,
  paginationClickable: true,
  parallax: true,
  simulateTouch: true,
  initialSlide: 0
});
slider.params.control = thumbs;
thumbs.params.control = slider;
</script>
