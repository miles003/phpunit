<template>
  <app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Dashboard
        </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <inertia-link :href="route('posts.create')" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Create New Post
            </inertia-link>
          </span>
      </div>
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-5">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500" v-show="flash.success">
                <span class="inline-block align-middle">
                    <b class="capitalize">Success:</b> {{flash.success}}
                </span>
            </div>
            <table class="table-fixed w-full">
              <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">No.</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Content</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="post in data">
                  <td class="border px-4 py-2">{{ post.id }}</td>
                  <td class="border px-4 py-2">{{ post.title }}</td>
                  <td class="border px-4 py-2">{{ post.content }}</td>
                  <td class="border px-4 py-2">
                    <inertia-link  :href="route('posts.edit', post.id)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-0.5">Edit</inertia-link >
                    <button @click="destroy(post.id)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout'
export default {
  components: {
    AppLayout,
  },
  props:['data', 'flash'],
  methods:{
    destroy (id) {
      this.$inertia.delete(this.route('posts.destroy', id))
    }
  }
}
</script>
