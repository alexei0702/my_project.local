var marker;
function initMap() {  
  $.ajax({
    type:'POST',      
    url:'/bird_project/basic/web/index.php?r=site/get-coord',
    dataType: 'json',    
    success:function(data){    
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: data
      });
      marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: data
      });
      marker.addListener('click', toggleBounce);
    },
    error:function(){
      alert("Error getting data!");
    }
  });

  
}

function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
