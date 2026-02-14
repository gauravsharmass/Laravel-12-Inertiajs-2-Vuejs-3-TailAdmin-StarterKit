<script setup>
import FlashMessage from "../Components/FlashMessage.vue";
</script>
<template>
    <header>
        <nav class="relative bg-gray-800">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div
                        class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start"
                    >
                        <div class="flex shrink-0 items-center">
                            <!-- Project logo goes here... -->
                        </div>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="px-6 py-4">
            <FlashMessage />
        </div>

        <div class="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">
            <div
                class="relative flex flex-col justify-center w-full h-screen dark:bg-gray-900 sm:p-0 lg:flex-row"
            >
                <div class="flex flex-col flex-1 w-full lg:w-1/2">
                    <div
                        class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto"
                    >
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
