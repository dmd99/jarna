<template>
    <div class="position-relative">
        <div @mouseenter="visible=true"  
            @mouseleave="visible=false"> 
            <img height="20px" src="/images/icons/menu.svg" alt="...">
            Categories
        </div>
        <div @mouseenter="visible=true" 
            @mouseleave="visible=false" v-show="visible" class="categorie-container">
            <ul>
                <li v-for="(category, index) in categories" :key="index">
                    {{ category.name }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            visible: false,
            categories: [],
        };
    },
    methods: {
        getCategories() {
            axios.get("/api/categories").then((response) => {
                this.categories = response.data;
            });
        },
    },
    mounted() {},
    created() {
        this.getCategories();
    },
};
</script>

<style>
.categorie-container {
    position: absolute;
    z-index: 60;
    background: white;
    width: 50vw;
    border: 1px solid #ebebeb;
    padding: 16px 32px;
    border-radius: 16px;
    top: 0;
    box-shadow: 16px 16px 60px -12px #f5f0f0;
}
.categorie-container ul li {
    list-style: none;
}
</style>
