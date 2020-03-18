<template>
  <div>
    <h1>Edit Post</h1>
    <form @submit.prevent="updatePost">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Post Title:</label>
            <input type="text" class="form-control" v-model="post.title" >
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
          <button class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
</template>

<script>
    
    export default {
          // options:categories
      // cat: '1',
      data() {
        return {
          post: {},
          category: 0,
          categories:[],
        }
      },
      created() {
        let uri = `http://vl.test/api/post/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.post = response.data;
        });
        let uri2 = `http://vl.test/api/categories`;
        this.axios.get(uri2).then((response2) => {
            this.categories = response2.data.data;
            // console.log(this.categories);
        });
      },
      methods: {
        updatePost() {
          let uri = `http://vl.test/api/post/update/${this.$route.params.id}`;
          let data2 = {post: this.post, category:this.category};
          this.axios.post(uri, data2).then((response) => {
            this.$router.push({name: 'posts'});
          });
        },
      }
    }
</script>