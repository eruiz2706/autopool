<template>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    
    <!--<div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>-->
      <div class="sidebar-brand-text mx-3">The King Of Rub</div>
    </a>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" v-for="menu in getMenu">
        <router-link class="nav-link" v-bind:to="menu.url">
          <i v-bind:class="`fa fa-fw ${menu.icono}`"></i>
          <span>{{ menu.titulo }}</span>
        </router-link>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
</template>

<script>
export default {
    name: 'app-sidebar',
    mounted() {
      this.init();
      this.init_plugins();
    },
    methods:{
        init_plugins(){
          try {
            //$( document ).ready(function() {
              $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
                $("body").toggleClass("sidebar-toggled");
                $(".sidebar").toggleClass("toggled");
                if ($(".sidebar").hasClass("toggled")) {
                  $('.sidebar .collapse').collapse('hide');
                };
              });

              $(window).resize(function() {
                if ($(window).width() < 768) {
                  $('.sidebar .collapse').collapse('hide');
                };
                
                if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
                  $("body").addClass("sidebar-toggled");
                  $(".sidebar").addClass("toggled");
                  $('.sidebar .collapse').collapse('hide');
                };
              });

              $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
                if ($(window).width() > 768) {
                  var e0 = e.originalEvent,
                    delta = e0.wheelDelta || -e0.detail;
                  this.scrollTop += (delta < 0 ? 1 : -1) * 30;
                  e.preventDefault();
                }
              });

              $(document).on('scroll', function() {
                var scrollDistance = $(this).scrollTop();
                if (scrollDistance > 100) {
                  $('.scroll-to-top').fadeIn();
                } else {
                  $('.scroll-to-top').fadeOut();
                }
              });

              $(document).on('click', 'a.scroll-to-top', function(e) {
                var $anchor = $(this);
                $('html, body').stop().animate({
                  scrollTop: ($($anchor.attr('href')).offset().top)
                }, 1000, 'easeInOutExpo');
                e.preventDefault();
              });
            //});
          } catch (e) {
            console.log("no cargo menu sidebar");
            //console.log(e);
          }
        },
        init(){
          
        }
    },
    computed:{
      getMenu(){
        return this.$store.state.menu;
      }
    }
}
</script>

<style>
</style>
