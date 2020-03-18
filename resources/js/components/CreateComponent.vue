<template>
  <div>
    <h1>Create A Post</h1>
    <form @submit.prevent="addPost">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Post Title:</label>
            <input type="text" class="form-control" v-model="post.title">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Post Body:</label>
              <textarea class="form-control" v-model="post.body" rows="5"></textarea>
            </div>
          </div>
        </div><br />
        <div class="row">
          <div class="col-md-6">
            <select v-model="category">
                  <option value='0' >Select Category</option>
                   <option v-for="category in categories" v-bind:value="{ id: category.id, text: category.title }">{{ category.title }}
                   </option>
               </select>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Create</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
        data(){
          return {
            post:{},
            category: 0,
            categories:[],
          };
        },
        created(){
          let category_uri = `http://vl.test/api/categories`;
          this.axios.get(category_uri).then((response2) => {
              this.categories = response2.data.data;
              // console.log(this.categories);
          });
        },
        methods: {
          addPost(){
            // console.log(this.post);
            let uri = 'http://vl.test/api/post/create';
            let data = {post: this.post, category:this.category};
            this.axios.post(uri, data).then((response) => {
               this.$router.push({name: 'posts'});
            });
          }
        }
  }
</script>