<template>
    <div class="ml-2 mt-6 text-zinc-950 text-xl">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <Link :href="route('notes.create')">Создать заметку</Link>
        </button>
        <div>
            <TagBar />
        </div>

      <div class="search-wrapper panel-heading col-sm-12 mt-4">
        <input
          v-model="filter.title"
          placeholder="Search"
        />
        <button class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <a @click.prevent="search">Search</a>
        </button>
      </div>

        <div v-for="note in noteData" :key="note.id">
        <h2>{{ note.title }}</h2>
        <p>{{ note.content }}</p>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <Link :href="route('notes.edit', note.id)">Редактировать</Link>
        </button>

        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            <a @click.prevent="deleteNote(note.id)">Удалить</a>
        </button>
        </div>
    </div>

</template>

<script>

import { Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import axios from 'axios';

export default{
    name: 'Index',
    components:{
        Link
    },
    props:{
        notes:Array
    },
    data(){
        return{
            filter: {
                title: ''
            },
            noteData: this.notes,
        }
    },
    mounted(){
        console.log(this.notes);
    },
    methods:{
        search(){
            axios.get('/notes/search/'+ this.filter.title)
            .then(response => {
                this.noteData = response.data;
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            });
        },
        deleteNote(note){
                axios.delete('/notes/' + note)
            .then(response => {
                console.log(response);
            this.noteData = this.noteData.filter(item => item.id !== note);
            })
        }
    },

    layout: AdminLayout
}

</script>

<style scoped>
</style>
