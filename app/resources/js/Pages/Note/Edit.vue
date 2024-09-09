<template>
    <div class="ml-2 mt-6 text-zinc-950 text-xl">

        <div class="mb-4">
            <input v-model="note.title" type="text" placeholder="Название"/>
        </div>

        <div class="mb-4">
            <textarea v-model="note.content" type="text" placeholder="Контент"/>
        </div>

        <div class="mb-4">
            <select class="w-1/2 border-gray-200" v-model="note.tag_id">
                <option value="">Выберите тег</option>
                <option v-for="tag in tags" :key="tag.id" :value="tag.id">{{ tag.title }}</option>
            </select>
        </div>
            <button @click.prevent="editNote" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-4">
                Изменить заметку
            </button>
        </div>
</template>

<script>


export default {
    name: "Edit",
    props: {
        tags: Array,
        note:Array,
    },


    methods: {
        editNote() {
            axios.patch('/notes', this.note)
            .then(response => {
                console.log(response);
            this.note = {};
            })
            }
        }
    }

</script>

<style scoped>

</style>
