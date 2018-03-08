<template>
  <div>

      <input class="form-control mr-sm-2" type="text" v-model="queryString" v-on:keyup="getResults()">

      <ul class="list-group results" v-if="posts.length">
        <li class="list-group-item" v-for="post in posts"> <a v-bind:href="url + post.id">{{ post.slug }}</a> </li>
      </ul>
  </div>
</template>
<script>
export default {
  name: "SearchQuery",
  data(){
    return {
      queryString: '',
      posts: [],
      url: '/post/',
    }
  },
  methods: {
    getResults(){
      this.posts = [];
      axios.get('/api/search', {params: {queryString: this.queryString}}).then(response => {
        response.data.forEach((post)=>{
          this.posts.push(post);
        });
      });
    }
  }
}
</script>
<style scoped>


</style>
