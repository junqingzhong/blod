import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);



export default new VueRouter({
    saveScrollPosition:true,
    mode:'history',
    routes:[
        {
            name:"index",
            path:"/",    
            component: resolve =>void(require(['../components/Index.vue'], resolve))
        },
        {   
            name:"article",
            path:"/art-:id",    
            component: resolve =>void(require(['../components/Article.vue'], resolve))
        },
        
    ]
})