<template v-slot:Tag>

    <div>
        dfdfgdgd
    </div>



</template>

<script>

import { Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

export default{
    name: 'Index',
    components:{
        Link
    },
    props:{
        tags:Array
    },
    methods:{
        deleteNote(note){
                axios.delete('/notes/' + note)
            .then(response => {
                console.log(response);
            this.note = {};
            })
        }
    },
    layout: AdminLayout
}

</script>

<style scoped>
</style>
