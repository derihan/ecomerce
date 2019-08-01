 $(document).ready(function(){
        $('.over-nav').hide();
        $('.menu-nav').hide();
        $('.login-nav').hide();
        $('.home').click(function(){
            $('.chart-nav').hide();
            $('.login-nav').hide();
            $('.login').show();
            $('.login-x').hide();
            $('.chart').show();
            $('.chart-x').hide();
            $('.over-nav').show();
            $('.menu-nav').show();
            $('.menu-nav').addClass('nav-animate');
            $('.home-x').show();
            $('.home-x').addClass('home-animate');
            $(this).hide();
        })

        $('.home-x').click(function(){
            $('.over-nav').hide();
             $('.menu-nav').hide();
            $(this).hide();
            $('.home').show();
        })

        $('.filter').click(function(){
            $('.slide-filt').slideToggle("slow");
            $('.slide-search').slideUp("slow");
            $('.slide-cart').slideUp("slow");
        })

        $('.search').click(function(){
            $('.slide-search').slideToggle("slow");
             $('.slide-filt').slideUp("slow");
              $('.slide-cart').slideUp("slow");
        })
    });
 