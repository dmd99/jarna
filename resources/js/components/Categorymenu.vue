<template>
    <div>
        category
        {{ posts }}
    </div>
</template>

<script>

export default {
    data() {
        return {
            posts: [],
        };
    },
    created() {
        fetch('https://api.nuxtjs.dev/posts').then(
            res => { 
                this.posts=res.json();
                console.log(this.posts)
                console.log(this.posts)
        })
    },
};
</script>

<style></style>
