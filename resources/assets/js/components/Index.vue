<template>
  <el-row :gutter="10">
  <el-container  style="display:block">
      <el-col   :sm="24"  :lg="6" class="nav" style="text-align:center;">
      <div class="logo">
        <img :src="users.logo" style="border-radius:50%"/>
        <h1>{{users.name}}</h1>
        <h1>{{users.description}}</h1>
        <div class="share">
        <i class="fa fa-facebook-f"></i> 
        <i class="fa fa-weibo"></i> 
        <i class="fa fa-instagram"></i> 
        </div>
      </div>
      </el-col>
      <el-col  :sm="24"  :lg="18" >
        <el-main  v-loading="loading">
         <el-row :gutter="10" class="article " v-for="art in article" :key="art.id" >
         <router-link :to="{name:'article',params:{id:art.id}}"  v-if="art.img_path"><img :src="art.img_path" class="art_img" style="max-height:150px;float:left;"/></router-link>
         <el-col  :sm="12" :lg="18"  :class="[art.img_path?xs_12:xs_24]" style="float:left;margin-left:2em;" >
         <p class="art_time"  >{{ art.create_time | timeOut}}</p>
         <router-link :to="{name:'article',params:{id:art.id}}"><h3 class="art_title">{{ art.title |subString}}</h3></router-link>
         <p class="art_des">{{art.description |subString}}</p>
         </el-col>
         </el-row>
        </el-main>
      </el-col>
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
       xs_12:'el-col-xs-12',
       xs_24:'el-col-xs-24',
       users:[],
       article:[],
       loading:true,
     };
   },
   mounted:function(){
        this.getUsers();
        this.getArticles();
   },
    filters:{
        timeOut(time){
            var timestamp = Date.parse(time);
            var newDate = new Date();
            return newDate.toDateString(timestamp);
        },
        subString(str){
            return str.substring(0,10);
        }
    },
   methods:{
        getUsers(){
            this.loading = true;
            var resource = this.$http.get(this.url + "getUser")
                .then((response)=>{
                      this.users = response.data;
                      this.loading = false;

                })
                .catch((response)=>{
                    this.$message.error('还没登陆呢');
                    this.loading = false;
                });

        },
        getArticles(){
            this.loading = true;
           var resource = this.$http.get(this.url + "getArticle")
                .then((response)=>{
                    this.$set(this,'article',response.data);
                    this.loading = false;
                })
                .catch((response)=>{
                    this.$message.error('暂时没有新的文章');
                    this.loading = false;
                });
        }
   }
}
</script>
<style>
.art_time{
        color: rgba(0,0,0,.1);
    }
.art_title{
    font-family: -apple-system,BlinkMacSystemFont,Helvetica Neue,PingFang SC,Hiragino Sans GB,Droid Sans Fallback,Microsoft YaHei,sans-serif;
    font-size: 1.5em;
    font-weight: 600;
    }
.art_des{
    font-size: 1em;
    color: #9ea0a6;
    }
</style>
