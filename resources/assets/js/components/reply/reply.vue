<template>
  <div class="mt-3">
      <v-card>
          <v-card-title>
              <div class="headline">{{data.user}}</div>
              <div class="ml-2">said {{data.created_at}}</div>
              <v-spacer></v-spacer>
              <like :content = "data"></like>
          </v-card-title>
          <v-divider></v-divider>

          <edit-reply 
          v-if="editing"
          :reply=data
          ></edit-reply>

          <v-card-text v-else v-html="reply"></v-card-text>

        <v-divider></v-divider>
        <div v-if="!editing">
            <v-card-actions v-if="own">
              <v-btn icon small @click="edit">
                  <v-icon color="orange">edit</v-icon>
              </v-btn>
              <v-btn icon small @click="destroy">
                  <v-icon color="red">delete</v-icon>
              </v-btn>
          </v-card-actions>
        </div>
      </v-card>
  </div>
</template>

<script>
import EditReply from './editReply'
import Like from '../likes/like'
export default {
    props:['data','index'],
    components:{EditReply,Like},
    data(){
        return {
            editing:false
        }
    },
    computed:{
        own(){
            return User.own(this.data.user_id)
        },
        
        reply(){
            return md.parse(this.data.reply)
        }
    },
    created(){
        this.listen()
    },
    methods:{
        destroy(){
            EventBus.$emit('deleteReply',this.index)
        },
        edit(){
            this.editing = true
        },
        listen(){
            EventBus.$on('cancelEditing',()=>{
                this.editing = false
            })
        }
    }

}
</script>

<style>

</style>
