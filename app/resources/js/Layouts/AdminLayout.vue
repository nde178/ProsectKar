<template>
    <div>
        <div class="w-full mt-2 bg-green-500 size-11 flex items-center justify-center">
            <header class="w-3/4 mx-auto p-4">
                <h1 class="text-xl text-fuchsia-950 font-bold">Мои заметки</h1>
            </header>
        </div>
        <div  class="w-full h-9">
            <div  class="w-3/8 min-h-screen flex">
                <div class="w-1/4 bg-emerald-100 flex-auto place-items-center p-2">
                    <aside class="text-xl font-bold">
                    </aside>
                    <div class="grid grid-cols-1 gap-4 text-center w-40 mt-2 bg-sky-500 hover:bg-sky-700">
                        <h1>Заметки</h1>

                        <div v-for="tag in tagData" :key="tag.id">
                            <h2>{{tag.title}}</h2>
                        </div>

                    </div>
                </div>
                <div class="w-3/4 p-4">
                    <article>
                        <slot/>
                    </article>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import axios from 'axios';

export default{
    name: "AdminLayout",
    components: {
        Link
    },
    data(){
        return{
           tagData: axios.get('/tags').then(response => response.data),
           tagData: [],
        }
    },
    mounted(){
        console.log(this.tagData);
    },
}
</script>

<style scoped>
/* Add your custom styles here */
</style>


