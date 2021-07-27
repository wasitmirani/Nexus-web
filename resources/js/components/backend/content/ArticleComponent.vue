<template>
    <div>
          <div class="row">

            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between my-schedule mb-4">
                   <div class="d-flex align-items-center justify-content-between">
                        <h4 class="font-weight-bold">All Articles</h4>
                    </div>
                    <div class="create-workform">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <div class="modal-product-search d-flex">
                                <form class="mr-3 position-relative">
                                    <div class="form-group mb-0">
                                         <vs-input success v-model="query" placeholder="Search Article"/>
                                    </div>
                                </form>
                                  <vs-button gradient  to="/new/article" :active="true">
                                        Add Article
                                 </vs-button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-block card-stretch">
                            <div class="card-body p-0">
                                <div class="d-flex justify-content-between align-items-center p-3">
                                    <h5 class="font-weight-bold">Articles List</h5>
                                    <!-- <button class="btn btn-secondary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="20" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        Export
                                    </button> -->
                                </div>
                                <div class="table-responsive ">


                                    <table class="table  table-striped  mb-0">
   <thead>
      <tr>

         <th scope="col">Title</th>
         <th scope="col">Status</th>

         <th scope="col">Description</th>
               <th scope="col">Created By</th>
         <th scope="col">Created</th>
         <th scope="col">Action</th>
      </tr>
   </thead>
   <tbody>
      <tr v-for="item in articles" :key="item.id">
         <th scope="row">{{ item.title }}</th>
         <td><span class="mt-2 badge badge-pill badge-success">Posted</span></td>
         <td><p  v-html=" item.description"></p></td>
         <td>{{ item.user.name }}</td>
         <td> {{ item.created_at }}</td>
         <td>

            #

         </td>

      </tr>

   </tbody>
</table>
                                </div>

            </div>
        </div>
    </div>
      </div>
    </div>

</template>

<script>
export default {
    setup () {
        return {}
    },
    data(){
        return{
            articles:{},
            query:"",
        };
    },
    methods:{
            getArticles(){
                axios.get("/article/articles").then((res)=>{
                    this.articles=res.data.articles;
                });
            }
    },
    mounted(){
        this.getArticles();
    }
}
</script>

<style lang="scss" scoped>

</style>
