<template>
  <el-row :gutter="10">
  <el-container  style="display:block">
        <el-main  v-loading="loading">
          <div class="img_path" v-if="article.img_path" :style="{backgroundImage : 'url(' + article.img_path + ')'}" >
         </div>
         <el-col :lg="15" :xs="24" style="margin:0 auto;float:none;">
         <p class="art_time" >{{article.create_time | timeOut }} / {{article.author}}</p>
         <h1 class="art_title">{{article.title}}</h1>
         <h3 class="art_des">{{article.description}}</h3>
         <div v-html="article.content">
         </div>
         <p ><el-button size="small" v-for="tag in article.tags " :key="tag" round>{{tag}}</el-button></p>
         <div class="article" v-if="article.next" >
         <h3 class="art_time">NEXT</h3>
         <router-link :to="{name:'article',params:{id:article.next.id}}" @click.native="flushDom">
         <p class="art_title" style="font-size:1.5em">{{article.next.title}}</p>
         <span class="art_des" style="font-size:1em">{{article.next.description}}</span>
         </router-link>
         </div>
          </el-col>
        </el-main>
  </el-container>
  </el-row>
</template>
<script>
export default {
   name:'app',
   data: function() {
     return {
       url:"http://www.blod.com/Api/",
       userToken:'',
       article:[],
       loading:true,
     };
   },
   mounted:function(){
      this.getArticle();
   },
   beforeRouteUpdate(to,from,next){
      this.$router.go(0);//页面重载
      next();//确保要调用 next 方法，否则钩子就不会被 resolved
   }
   ,
    filters:{
        timeOut(time){
            var timestamp = Date.parse(time);
            var newDate = new Date();
            return newDate.toDateString(timestamp);
        },
    },
   methods:{
        flushDom(){
          this.$router.go(0);
        },
        getArticle(){
            this.loading = true;
            this.$http.get(this.url + "getArticle",{'id':this.$route.params.id})
                .then((response)=>{
                    this.$set(this,'article',response.data);
                    this.article.tags = response.data.tags.split(",");
                    this.loading = false;

                })
                .catch((response)=>{
                    this.$message.error('文章不存在');
                    this.loading = false;
                });
        }
   }
}
</script>
