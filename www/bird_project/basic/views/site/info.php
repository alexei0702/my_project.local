<h1 align="center">Над проектом работали</h1><br>
<style>
body
{
  background: #DAD7D7;
  color: #000;
}
.item
{
  height: 500px;
}
.carousel
{
  height: 500px;
  width: 800px !important;
}
.carousel-indicators
{
  transform: translate(350px,-435px);
}
</style>
<div class="row">
<div class="col-xs-offset-2">
<div id="authorCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#authorCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#authorCarousel" data-slide-to="1"></li>
    <li data-target="#authorCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="images/1.jpg" alt="photos-1">
      <div class="carousel-caption">
        <h4>Алексей Ефимов</h4>
        <p>Frontend,Backend,Design(нет)</p>
     </div>
    </div>
    <div class="item">
      <img src="images/2.jpg" alt="photos-2">
      <div class="carousel-caption">
        <h4>Хабитуев Баир Викторович</h4>
        <p>Консультант, духовный вдохновитель</p>
      </div>
    </div>
    <div class="item">
      <img src="images/3.jpg" alt="photos-3">
      <div class="carousel-caption">
        <h4>Человек собиравший инфу о птичках</h4>
        <p>Просто молодец!</p>
      </div>
    </div>
   </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#authorCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#authorCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
</div>
</div>