<link rel="stylesheet" type="text/css" href="https://futureradio.net/templates/slideshow.css">
<div class="slideshow-holder">
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 8</div>
  <img src="/images/mogmon.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 8</div>
  <img src="/images/traptues.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 8</div>
  <img src="/images/wastewend.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 8</div>
  <img src="/images/throwthurs.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 8</div>
  <img src="/images/futurefri.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">6 / 8</div>
  <img src="/images/stonersat.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">7 / 8</div>
  <img src="/images/lordsday.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">8 / 8</div>
  <img src="/images/futureallday.jpg" style="width:100%">
</div>


<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center;">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
  <span class="dot" onclick="currentSlide(6)"></span> 
  <span class="dot" onclick="currentSlide(7)"></span> 
  <span class="dot" onclick="currentSlide(8)"></span> 
</div>
</div>
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

