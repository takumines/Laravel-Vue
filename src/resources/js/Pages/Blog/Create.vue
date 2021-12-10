<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Blog
      </h2>
    </template>
    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <jet-form-section @submitted="createBlog">
          <template #title>Blog作成</template>
          <template #description>Blogの追加を行います</template>
          <template #form>
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="title" value="タイトル" />
              <jet-input
                  id="title"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.title"
              />
              <jet-input-error
                  :message="form.errors.title"
                  class="mt-2"
              />
            </div>
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="content" value="コンテント" />
              <textarea v-model="form.content" class="mt-1 block w-full form-input rounded-md shadow-sm"></textarea>
              <jet-input-error
                  :message="form.errors.content"
                  class="mt-2"
              />
            </div>
          </template>
          <template #actions>
            <jet-button
                class="bg-blue-700"
            >
              作成
            </jet-button>
          </template>
        </jet-form-section>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import JetFormSection from '@/Jetstream/FormSection.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInputError from "@/Jetstream/InputError";


export default defineComponent({
  components: {
    AppLayout,
    JetFormSection,
    JetLabel,
    JetInput,
    JetButton,
    JetInputError,
  },
  data() {
    return {
      form: this.$inertia.form(
          {
            title: "",
            content: "",
          },
          {
            resetOnSuccess: false,
          }
      ),
    };
  },
  methods: {
    createBlog() {
      this.form.post(route('blog.store'));
    },
  },
})
</script>
