<template>
   <div>
      <div class="row">
         <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between my-schedule mb-4">
               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="font-weight-bold">All Blogs</h4>
               </div>
               <div class="create-workform">
                  <div class="d-flex flex-wrap align-items-center justify-content-between">
                     <div class="modal-product-search d-flex">
                        <form class="mr-3 position-relative">
                           <div class="form-group mb-0">
                              <vs-input success v-model="query"   v-on:keyup="searchQuery"   placeholder="Search blogs"/>
                           </div>
                        </form>
                        <vs-button gradient  to="/new/blog" :active="true">
                           Add Blog
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
                     <h5 class="font-weight-bold">Blogs List</h5>
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
                           <tr v-for="item in blogs" :key="item.id">
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
                                <span class="material-icons text-danger">
                                delete
                                </span>
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
               blogs:{},
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
                    this.blogs={};
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
                                axios.get('/blog/delete/'+item.id).then((res)=>{
                                            Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success')
                                                this.getBlogs();

                                });

                            }
                            })
                },
               getBlogs(){
                   this.openLoading();
                   axios.get("/blog/blogs?query="+this.query).then((res)=>{
                       this.blogs=res.data.blogs;
                   });
               },
               edit(item){
                this.$router.push('/update/blog/'+item.id);
               }
       },
       mounted(){
           this.getBlogs();
       }
   }
</script>
<style lang="scss" scoped>
</style>
