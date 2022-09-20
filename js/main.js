document.addEventListener("DOMContentLoaded", function() {

  const blog = document.querySelector('.blog-latest__items');
  const readmoreBtn = document.querySelector('.blog-latest__more .readmore__button');
  
  if( blog && readmoreBtn ) {

    const blogRow = blog.querySelector('.blog-latest__row');
    const max_page = blog.getAttribute('data-max') || 1;

    function myFetch() {
      blog.classList.add('blog-latest__items--loading');
      return fetch.apply(this, arguments);
    }

    readmoreBtn.addEventListener('click', function(event) {
      event.preventDefault();

      let page = blog.getAttribute('data-current') || 1;

      const myData = {
        'action': 'loadmore',
        'query': c2c.query,
        'page': page
      }

      const params = new URLSearchParams(myData);

      myFetch(c2c.ajaxurl, {
        method: 'POST',
        body: params,
      })
      .then(response => response.text())
      .then(data => {
        blog.setAttribute('data-current', ++page);
        blog.classList.remove('blog-latest__items--loading');
        blogRow.insertAdjacentHTML('beforeend', data);

        if( page>= max_page ) readmoreBtn.parentElement.remove(); //we need to hide button on the last page
      })
      .catch((error) => {
        console.error('Error:', error);
      });
    });
  }

  const menuMobile = function() {
    const mobileBtn = document.querySelector('.hamburger');
    if( mobileBtn ) {
      const menu = document.querySelector('.nav-menu__container');

      mobileBtn.addEventListener('click', function(event) {
        event.preventDefault();
        this.classList.toggle('hamburger--active');
        document.body.classList.toggle('menu-mobile');
        menu.classList.toggle('nav-menu__container--mobile');
      });

      const onHashClick = function() {
        mobileBtn.classList.remove('hamburger--active');
        document.body.classList.remove('menu-mobile');
        menu.classList.remove('nav-menu__container--mobile');
      }
    }
  }
  menuMobile();

});