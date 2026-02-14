<script setup>
import User from "../../Layouts/User.vue";
</script>

<template>
    <User>
        <Head title="Dashboard" />
        <main>
            <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
                

                <div
                    class="min-h-screen rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12"
                >
                    <div class="mx-auto w-full max-w-[630px] text-center">
                        <h3
                            class="mb-4 text-theme-xl font-semibold text-gray-800 dark:text-white/90 sm:text-2xl"
                        >
                            Card Title Here user dashboard
                        </h3>

                        <p
                            class="text-sm text-gray-500 dark:text-gray-400 sm:text-base"
                        >
                            Start putting content on grids or panels...
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </User>
</template>
