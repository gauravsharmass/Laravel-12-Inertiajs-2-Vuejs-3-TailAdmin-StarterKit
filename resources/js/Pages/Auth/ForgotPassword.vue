<script setup>
import FormField from "../../Components/FormField.vue";
import Button from "../../Components/Button.vue";
import { useForm, Link } from "@inertiajs/vue3";
import AuthLayout from "../../Layouts/Auth.vue";

const form = useForm({
    email: null
});

const handleForgot = () => {
    form.post(route("postForgotPassword"), {
        onSuccess: () => {
            console.log("Forgot successful");
        },
        onError: (errors) => {
            console.log("Forgot failed", errors);
        },
    });
};
</script>
<template>
    <AuthLayout>
        <Head title="Forgot Password" />
        <div>
            <div class="mb-5 sm:mb-8">
                <h1
                    class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md"
                >
                    Forgot Password
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Enter your email to reset your password!
                </p>
            </div>
            <div>
                <form @submit.prevent="handleForgot()">
                    <div class="space-y-5">
                        <div>
                            <FormField
                                label="Email"
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
                            <Button
                                variant="primary"
                                type="submit"
                                :disabled="form.processing"
                                class="w-full"
                            >
                                {{
                                    form.processing
                                        ? "Resetting Password..."
                                        : "Reset Password"
                                }}
                            </Button>
                        </div>
                        <div class="text-center">
                            <span
                                class="text-sm text-gray-500 dark:text-gray-400"
                                >Back to
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
