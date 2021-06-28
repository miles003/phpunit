<template>
  <app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Form
        </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex  justify-center items-center">
        <div class=" inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
          <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500" v-show="flash.success">
            <span class="inline-block align-middle">
              <b class="capitalize">Success:</b> {{flash.success}}
            </span>
          </div>
          <form @submit.prevent="postData ? update():store()">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="">
                <div class="mb-4">
                  <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                  <input required type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Title" v-model="form.title">
                  <div class="text-red-500">{{ errors.title }}</div>
                </div>
                <div class="mb-4">
                  <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Body:</label>
                  <textarea required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" v-model="form.content" placeholder="Enter Body"></textarea>
                  <div class="text-red-500">{{ errors.content }}</div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button  type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                {{ButtonText}}
                </button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
  export default {
    props: ['postData', 'errors', 'flash'],
    components: {
      AppLayout,
    },
    data(){
      return {
        form:{
          title:'',
          content:'',
        },
        ButtonText:'Save'
      }
    },
    created () {
      this.ButtonText = this.postData ? 'Update':'Save'
      this.form = this.postData ? this.postData:{}
    },
    methods:{
      update(){
        this.$inertia.patch('/posts/'+this.form.id,this.form)
      },
      store () {
        this.$inertia.post('/posts',this.form)
      }
    }
  }
</script>
