<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthLayout from '@/Layouts/AuthLayout.vue';
import MLoginForm from "@/UI/Modules/Auth/MLoginForm.vue";
import MLoginInput from "@/UI/Components/Auth/MLoginInput.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
  form.transform(data => ({
    ...data,
    remember: form.remember ? 'on' : '',
  })).post(route('login'), {
    onFinish: () => {
      form.reset('password')
    },
  });
};
</script>

<template>
  <AuthLayout>
    <MLoginForm
      submit-text="Войти"
      title="Login"
      @submit="submit"
    >
      <template #inputs>
        <MLoginInput
          v-model="form.email"
          title="Email"
          type="email"
        />
        <MLoginInput
          v-model="form.password"
          title="Password"
          type="password"
        />
      </template>

      <template #actions>
        <q-toggle v-model="form.remember" label="Запомнить меня"/>
      </template>
    </MLoginForm>
  </AuthLayout>
</template>
