<template>
  <div id="wrapper" v-if="autenticado">
    <!-- Sidebar -->
    <app-sidebar></app-sidebar>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar --> 
        <app-navbar></app-navbar>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <router-view></router-view>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <app-footer></app-footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
  </div>
  
  <div class="spinner-border text-primary" role="status" v-else>
    <span class="sr-only">Loading...</span>
  </div>
</template>

<script>
import Footer from './Footer';
import SidebarMenu from './SidebarMenu';
import Navbar from './Navbar';

export default {
    name: 'app-content',
    components:{
        'app-footer': Footer,
        'app-sidebar': SidebarMenu,
        'app-navbar': Navbar
    },
    data(){
        return{
            baseUrl: BASE_URL,
            req: axios.create({
                baseUrl:  BASE_URL
            }),
            autenticado: false
        }
    },
    mounted() {
      this.init();
    },
    methods:{
        init(){
            this.autenticado = false;
            this.req.post('auth/init').then( response => {
              if(response.data.user !== null){
                this.$store.commit('authUser',response.data.user);
                this.$store.commit('addMenu',response.data.menu);
                this.$store.commit('addMenuTop',response.data.menu_top);
                this.autenticado = true;
              }else{
                this.$router.push('/login');
              }
            });
        },
    },
}
</script>
