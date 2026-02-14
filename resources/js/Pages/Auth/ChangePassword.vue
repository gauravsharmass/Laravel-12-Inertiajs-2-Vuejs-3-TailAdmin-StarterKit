<script setup>
import Common from "../../Layouts/Common.vue";
import FormField from "../../Components/FormField.vue";
import Button from "../../Components/Button.vue";
import { useForm, Link } from "@inertiajs/vue3";

const form = useForm({
    password: null,
    password_confirmation: null,
});

const handleChangePassword = () => {
    form.post(route("postChangePassword"), {
        onSuccess: () => {
            console.log("Password change successful");
        },
        onError: (errors) => {
            console.log("Password change failed", errors);
        },
    });
};
</script>
<template>
    <Common>
        <Head title="Change Password" />
        <main>
            <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
                <div
                    class="min-h-screen rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12"
                >
                    <div
                        class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
                    >
                        <!-- Card Header -->
                        <div class="px-6 py-5">
                            <h3
                                class="text-base font-medium text-gray-800 dark:text-white/90"
                            >
                                Change Password
                            </h3>
                        </div>

                        <!-- Card Body -->
                        <div
                            class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6"
                        >
                            <div class="space-y-6">
                                <form @submit.prevent="handleChangePassword()">
                                    <div class="space-y-5">
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
                                                v-model="
                                                    form.password_confirmation
                                                "
                                            />
                                            <span
                                                v-if="
                                                    form.errors
                                                        .password_confirmation
                                                "
                                                class="text-sm text-red-600"
                                            >
                                                {{
                                                    form.errors
                                                        .password_confirmation
                                                }}
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
                                                        ? "Changing Password..."
                                                        : "Change Password"
                                                }}
                                            </Button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </Common>
</template>
