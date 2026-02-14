<script setup>
import FormField from "../../Components/FormField.vue";
import Button from "../../Components/Button.vue";
import { useForm, Link } from "@inertiajs/vue3";
import AuthLayout from "../../Layouts/Auth.vue";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    terms: false,
});

const handleRegister = () => {
    form.post(route("postRegister"), {
        onSuccess: () => {
            console.log("Login successful");
        },
        onError: (errors) => {
            console.log("Login failed", errors);
        }
    });
};
</script>
<template>
    <AuthLayout>
        <Head title="Sign Up" />
        <div>
            <div class="mb-5 sm:mb-8">
                <h1
                    class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md"
                >
                    Sign Up
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Enter the details below to sign up!
                </p>
            </div>
            <div>
                <form @submit.prevent="handleRegister()">
                    <div class="space-y-5">
                        <div>
                            <FormField
                                label="Name"
                                name="name"
                                id="name"
                                placeholder="Enter your name"
                                v-model="form.name"
                            />
                            <span
                                v-if="form.errors.name"
                                class="text-sm text-red-600"
                            >
                                {{ form.errors.name }}
                            </span>
                        </div>
                        <div>
                            <FormField
                                label="Email"
                                name="email"
                                id="email"
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
                                name="password"
                                id="password"
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
                        <div>
                            <FormField
                                label="Confirm Password"
                                name="password_confirmation"
                                id="password_confirmation"
                                type="password"
                                placeholder="Confirm your password"
                                v-model="form.password_confirmation"
                            />
                            <span
                                v-if="form.errors.password_confirmation"
                                class="text-sm text-red-600"
                            >
                                {{ form.errors.password_confirmation }}
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
                                                name="terms"
                                                type="checkbox"
                                                value=""
                                                v-model="form.terms"
                                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
                                            />
                                            <label
                                                for="default-checkbox"
                                                class="select-none ms-2 text-sm font-medium text-heading"
                                                >I agree to terms and
                                                conditions</label
                                            >
                                            
                                        </div>
                                    </div>
                                    
                                </label>
                                <span
                                                v-if="form.errors.terms"
                                                class="text-sm text-red-600"
                                            >
                                                {{ form.errors.terms }}
                                            </span>
                            </div>
                        </div>

                        <div>
                            <Button
                                variant="primary"
                                type="submit"
                                :disabled="form.processing"
                                class="w-full"
                            >
                                {{
                                    form.processing
                                        ? "Signing Up..."
                                        : "Sign Up"
                                }}
                            </Button>
                        </div>
                        <div class="text-center">
                            <span
                                class="text-sm text-gray-500 dark:text-gray-400"
                                >Already have an account?
                                <Link
                                    :href="route('login')"
                                    class="text-brand-500 hover:text-brand-600 dark:text-brand-400"
                                    >Sign In</Link
                                >
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AuthLayout>
</template>
