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
                              <vs-input success v-model="query"   v-on:keyup="searchQuery"   placeholder="Search Article"/>
                           </div>
                        </form>
                        <vs-button gradient class="float-right"    to="/new/article" :active="true">
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
                              <td>
                                 <p  v-html=" item.description"></p>
                              </td>
                              <td>{{ item.user.name }}</td>
                              <td> {{ item.created_at | timeformat }}</td>
                              <td>
                                <a role="button" @click="edit(item)">
                                 <span class="material-icons text-primary">
                                    drive_file_rename_outline
                                 </span>
                                </a>
                                |
                                <a role="button"  @click="delete_Item(item)">
                                <i class="material-icons text-danger">

                                </i>
                                </a>
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
               isloading:false,
           };
       },
       methods:{
             searchQuery(){
                setTimeout(() => {
                      this.getBlogs();
                    }, 1000)
           },
            openLoading() {
                    const loading = this.$vs.loading()
                    this.isloading=true;
                    this.articles={};
                    setTimeout(() => {
                        loading.close()
                         this.isloading=false;
                    }, 1000)
                    },
                delete_Item(item){
                    Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                axios.get('/article/delete/'+item.id).then((res)=>{
                                            Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success')
                                                this.getArticles();

                                });

                            }
                            })
                },
               getArticles(){
                   this.openLoading();
                   axios.get("/article/articles?query="+this.query).then((res)=>{
                       this.articles=res.data.articles;
                   });
               },
               edit(item){
                this.$router.push('/update/article/'+item.id);
               }
       },
       mounted(){
           this.getArticles();
       }
   }
</script>
<style lang="scss" scoped>
</style>
