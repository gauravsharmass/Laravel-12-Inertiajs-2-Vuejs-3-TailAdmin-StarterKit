<script setup>
import FormField from "../../Components/FormField.vue";
import Button from "../../Components/Button.vue";
import { useForm, Link } from "@inertiajs/vue3";
import AuthLayout from "../../Layouts/Auth.vue";

const form = useForm({
    email: null,
    password: null,
    remember: false,
});

const handleLogin = () => {
    form.post(route("postLogin"), {
        onSuccess: () => {
            console.log("Login successful");
        },
        onError: (errors) => {
            console.log("Login failed", errors);
        },
    });
};
</script>
<template>
    <AuthLayout>
        <Head title="Sign In" />
        <div>
            <div class="mb-5 sm:mb-8">
                <h1
                    class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md"
                >
                    Sign In
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Enter your email and password to sign in!
                </p>
            </div>
            <div>
                <form @submit.prevent="handleLogin()">
                    <div class="space-y-5">
                        <div>
                            <FormField
                                label="Email"
                                id="email"
                                name="email"
                                type="email"
                                placeholder="Enter your email"
                                v-model="form.email"
                            />
                            <span
                                v-if="form.errors.email"
                                class="text-sm text-red-600"
                            >
                                {{ form.errors.email }}
                            </span>
                        </div>

                        <div>
                            <FormField
                                label="Password"
                                id="password"
                                name="password"
                                type="password"
                                placeholder="Enter your password"
                                v-model="form.password"
                            />
                            <span
                                v-if="form.errors.password"
                                class="text-sm text-red-600"
                            >
                                {{ form.errors.password }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between">
                            <div>
                                <label
                                    for="checkboxLabelOne"
                                    class="flex items-center text-sm font-normal text-gray-700 cursor-pointer select-none dark:text-gray-400"
                                >
                                    <div class="relative">
                                        <div class="flex items-center mb-4">
                                            <input
                                                id="default-checkbox"
                                                type="checkbox"
                                                name="remember"
                                                value=""
                                                v-model="form.remember"
                                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
                                            />
                                            <label
                                                for="default-checkbox"
                                                class="select-none ms-2 text-sm font-medium text-heading"
                                                >Remember me</label
                                            >
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <Link
                                :href="route('forgotPassword')"
                                class="text-sm text-brand-500 hover:text-brand-600 dark:text-brand-400"
                                >Forgot password?
                            </Link>
                        </div>

                        <div>
                            <Button
                                variant="primary"
                                type="submit"
                                class="w-full"
                                :disabled="form.processing"
                            >
                                {{ form.processing ? 'Signing In...' : 'Sign In' }}
                            </Button>
                        </div>
                        <div class="text-center">
                            <span
                                class="text-sm text-gray-500 dark:text-gray-400"
                                >Don't have an account?
                                <Link
                                    :href="route('register')"
                                    class="text-brand-500 hover:text-brand-600 dark:text-brand-400"
                                    >Sign Up</Link
                                >
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AuthLayout>
</template>
