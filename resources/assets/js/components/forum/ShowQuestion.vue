<template>
    <v-card>
        <v-container fluid>
        <v-card-title>
            <div>
                <div class="headline">
                    {{data.title}}
                </div>
                <span class="grey--text">{{data.user}} said {{data.created_at}}</span>
            </div>
            <v-spacer></v-spacer>
            <v-btn color="teal">5 Replies</v-btn>
        </v-card-title>

        <v-card-text v-html="body"></v-card-text>

        <v-card-actions v-if="own">
            <v-btn icon small @click="edit">
                <v-icon color="orange">edit</v-icon>
            </v-btn>
            <v-btn icon small @click="destroy">
                <v-icon color="red">delete</v-icon>
            </v-btn>
        </v-card-actions>
        </v-container>
    </v-card>
</template>

<script>
export default {
    props:['data'],
    data(){
        return {
            own : User.own(this.data.user_id)
        }
    },
    computed:{
        body(){
            return md.parse(this.data.body)
        }
    },
    methods:{
        destroy(){
            axios.delete(`/api/question/${this.data.slug}`)
            .then(res => this.$router.push('/forum'))
            .catch(error => console.log(error.response.data))
        },
        edit(){
            EventBus.$emit('startEditing')
        }
    }
}
</script>

<style>

</style>
