<script setup>
import FormField from "../../Components/FormField.vue";
import Button from "../../Components/Button.vue";
import { useForm, Link } from "@inertiajs/vue3";
import AuthLayout from "../../Layouts/Auth.vue";

const props = defineProps({
    token: String,
    email: String,
});
const form = useForm({
    token: props.token,
    email: props.email,
    password: null,
    password_confirmation: null,
});
const handleReset = () => {
    form.post(route("password.update"), {
        onSuccess: () => {
            console.log("Password reset successful");
        },
        onError: (errors) => {
            console.log("Password reset failed", errors);
        }
    });
};
</script>
<template>
    <AuthLayout>
        <Head title="Reset Password" />
        <div>
            <div class="mb-5 sm:mb-8">
                <h1
                    class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md"
                >
                    Reset Password
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Enter new password
                </p>
            </div>

            <div>
                <form @submit.prevent="handleReset()">
                    <FormField
                        name="token"
                        id="token"
                        type="hidden"
                        v-model="form.token"
                    />
                    <FormField
                        name="email"
                        id="email"
                        type="hidden"
                        v-model="form.email"
                    />

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
                </form>

                <p class="mt-6 text-center text-gray-600 dark:text-gray-400">
                    <Link
                        href="/login"
                        class="text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300"
                    >
                        Back to Login
                    </Link>
                </p>
            </div>
        </div>
    </AuthLayout>
</template>
