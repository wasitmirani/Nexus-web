<template>
  <div>
            <div class="row">
            <div class="col-sm-12 col-lg-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title" > {{ editmode ? "Update" : "Create" }} New Blog</h4>
                     </div>
                  <div class="header-action">

                        </div>
                  </div>
                  <div class="card-body">
                        <form v-on:submit.prevent="onSubmit">
                            <div class="row">
                                  <div class="form-group col-12">
                            <label for="email"> Blog Title:</label>
                                <vs-input success type="text" required v-model="title" placeholder="Blog Title" />
                             </div>
                        <div class="form-group col-12">
                            <label for="pwd"> Blog Description:</label>
                             <vue-editor v-model="description" required></vue-editor>
                        </div>

                          <vs-button  size="large"  gradient :active="true" type="submit" v-if="!editmode">
                            Submit  <i class="bx bx-home-alt"></i>
                            </vs-button>
                              <vs-button  size="large"  gradient :active="true" type="submit" v-else>
                            Update <i class="bx bx-home-alt"></i>
                            </vs-button>
                            <vs-button  size="large"  color="danger" gradient :active="true" to="/blogs" type="submit">
                                Cancel  <i class="bx bx-home-alt"></i>
                            </vs-button>
                            </div>
                        </form>
                  </div>
               </div>
            </div>
        </div>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
export default {
  components: {
       VueEditor
  },
    data(){
        return {
                title:"",
                description:"",
                editmode:false,
                blog:{},
        }
    },
    mounted(){

        if(this.$route.params.id){
            this.editmode=true;
            axios.get('/blog/get/'+this.$route.params.id).then((res)=>{
                this.blog=res.data.blog;
                this.title=this.blog.title;
                this.description=this.blog.description;
            });
        }
        else {
            this.editmode=false;
        }
        console.log(this.$route.params.id);
    },
    methods:{
             openNotification(position = null, color,type="New",message=null) {
                const noti = this.$vs.notification({
                    color,
                    position,
                    title: type+' blog Success',
                    text: message,
                });
                },
        onSubmit(){
            let formdata= new FormData();
            formdata.append("title",this.title);
            formdata.append("description",this.description);
            formdata.append("user_id",user.id);
            let url="/blog/post";
            if(this.editmode){
            formdata.append("id",this.blog.id);
            url="/blog/update";
            }
            axios.post(url,formdata).then((res)=>{
                 if(this.editmode){
                    this.openNotification('top-right', 'primary',"Update","This blog has been updated");
                 }
                 else {
                      this.openNotification('top-right', 'success',"New","This blog has been created");
                 }
                      setTimeout(() => {
                          this.$router.push('/blogs');
                      }, 2000)
            });
        }
    }
}
</script>

<style>
.vs-input {
    width: 100%;
}
.vs-select-content {
    width: 100%;
    max-width: 100%;
}
</style>
