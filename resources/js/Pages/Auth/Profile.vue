<script setup>
import Common from "../../Layouts/Common.vue";
import FormField from "../../Components/FormField.vue";
import Button from "../../Components/Button.vue";
import { useForm, usePage } from "@inertiajs/vue3";
const page = usePage();

const form = useForm({
    name: page.props.auth.name ?? null,
    email: page.props.auth.email ?? null,
});

const handleProfile = () => {
    form.post(route("updateProfile"), {
        onSuccess: () => {
            console.log("Profile update successful");
        },
        onError: (errors) => {
            console.log("Profile update failed", errors);
        },
    });
};
</script>
<template>
    <Common>
        <Head title="My Profile" />
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
                                Update Profile
                            </h3>
                        </div>

                        <!-- Card Body -->
                        <div
                            class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6"
                        >
                            <div class="space-y-6">
                                <form @submit.prevent="handleProfile()">
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
                                            <Button
                                                variant="primary"
                                                type="submit"
                                                :disabled="form.processing"
                                                class="w-full"
                                            >
                                                {{
                                                    form.processing
                                                        ? "Updating Profile..."
                                                        : "Update Profile"
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
