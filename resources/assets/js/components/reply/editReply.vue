<template>
    <div>
        <markdown-editor v-model="reply.reply"></markdown-editor>
        <v-card-actions>
              <v-btn icon small @click="update">
                  <v-icon color="green">save</v-icon>
              </v-btn>
              <v-btn icon small @click="cancel">
                  <v-icon color="black">cancel</v-icon>
              </v-btn>
          </v-card-actions>
    </div>
</template>

<script>
export default {
    props:['reply'],
    methods:{
        cancel(){
            EventBus.$emit('cancelEditing');
        },
        update(){
            axios.patch(`/api/question/${this.reply.question_slug}/reply/${this.reply.id}`,{body:this.reply.reply})
            .then(res => this.cancel())
        }
    }
}
</script>

<style>

</style>
