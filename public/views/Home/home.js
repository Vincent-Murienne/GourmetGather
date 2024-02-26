var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});


const buttons = document.querySelectorAll('.aboutMe');
buttons.forEach(button => {
    button.addEventListener('click', function() {
        const recetteId = this.getAttribute('data-id');
        window.location.href = 'src/views/DetailsRecette/detailsRecetteViews.php?id=' + recetteId;
    });
});


function search() {
  var input = document.getElementById('searchbar').value.toLowerCase();
  var cards = document.querySelectorAll('.swiper-slide');
  var visibleCardCount = 0;
  
  cards.forEach(function(card) {
      var title = card.querySelector('.name').textContent.toLowerCase();
      var description = card.querySelector('.profession').textContent.toLowerCase();
      if (title.includes(input) || description.includes(input)) {
          card.style.display = 'block';
          visibleCardCount++;
      } else {
          card.style.display = 'none';
      }
  });

  if (visibleCardCount < 3) {
      document.querySelector('.swiper-button-next').style.display = 'none';
      document.querySelector('.swiper-button-prev').style.display = 'none';
      document.querySelector('.swiper-pagination').style.display = 'none';
  } else {
      document.querySelector('.swiper-button-next').style.display = 'block';
      document.querySelector('.swiper-button-prev').style.display = 'block';
      document.querySelector('.swiper-pagination').style.display = 'block';
  }
}


