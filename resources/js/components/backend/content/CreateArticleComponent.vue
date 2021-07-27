<template>
  <div>
            <div class="row">
            <div class="col-sm-12 col-lg-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Create New Article</h4>
                     </div>
                  <div class="header-action">

                        </div>
                  </div>
                  <div class="card-body">
                        <form v-on:submit.prevent="onSubmit">
                            <div class="row">
                                  <div class="form-group col-12">
                            <label for="email"> Article Title:</label>
                                <vs-input success type="text" required v-model="title" placeholder="Article Title" />
                             </div>
                        <div class="form-group col-12">
                            <label for="pwd"> Article Description:</label>
                             <vue-editor v-model="description" required></vue-editor>
                        </div>

                          <vs-button  size="large"  gradient :active="true" type="submit">
                            Submit  <i class="bx bx-home-alt"></i>
                            </vs-button>
                            <vs-button  size="large"  color="danger" gradient :active="true" to="/articles" type="submit">
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
        }
    },
    methods:{
             openNotification(position = null, color) {
                const noti = this.$vs.notification({
                    color,
                    position,
                    title: 'New Article Successfuly',
                    text: 'New article posted uccessfuly'
                });
                },
        onSubmit(){
            let formdata= new FormData();
            formdata.append("title",this.title);
            formdata.append("description",this.description);
            formdata.append("user_id",user.id);

            axios.post("/article/post",formdata).then((res)=>{
                    this.openNotification('top-right', 'success');

                      setTimeout(() => {
                          this.$router.push('/articles');

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
