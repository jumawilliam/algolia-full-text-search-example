<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
  <body id="app">
  <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" v-model="searchQuery" class="form-control" >
  </div>
  <div v-if="results.length>0">
  <ul v-for="(result,index) in results" >
      <li>@{{result.title}}</li>
   </ul>
  </div>
</form>
  <script>
    const {createApp}=Vue
    createApp({
        data(){
            return{
                searchQuery:null,
                results:[],
            }
            
        },
        methods:{
            getResults(){
                axios.get('/search/'+this.searchQuery).then(res=>{
                    this.results=res.data
                }).catch(error=>{
                    console.log(error)
                })
            }
        },
        watch:{
            searchQuery(after,before){
                this.getResults();
            }
        },
        mounted(){
            alert('vue js working')
        },
    }).mount('#app')
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>