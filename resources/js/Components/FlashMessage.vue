<script setup>
import { ref, watch } from "vue";
import { usePage } from "@inertiajs/vue3";
const page = usePage();

const showSuccess = ref(false);
const showError = ref(false);
let successTimer = null;
let errorTimer = null;
let timeout = 5000;

watch(
    () => page.props.flash,
    (flash) => {
        // clear previous timers
        if (successTimer) {
            clearTimeout(successTimer);
            successTimer = null;
        }
        if (errorTimer) {
            clearTimeout(errorTimer);
            errorTimer = null;
        }

        showSuccess.value = !!flash?.success;
        showError.value = !!flash?.error;

        if (showSuccess.value) {
            successTimer = setTimeout(() => {
                showSuccess.value = false;
                successTimer = null;
            }, timeout);
        }

        if (showError.value) {
            errorTimer = setTimeout(() => {
                showError.value = false;
                errorTimer = null;
            }, timeout);
        }
    },
    { immediate: true },
);
</script>
<template>
    <div class="flex items-start gap-3" v-if="showSuccess">
        <div class="-mt-0.5 text-success-500">
            <svg
                class="fill-current"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M3.70186 12.0001C3.70186 7.41711 7.41711 3.70186 12.0001 3.70186C16.5831 3.70186 20.2984 7.41711 20.2984 12.0001C20.2984 16.5831 16.5831 20.2984 12.0001 20.2984C7.41711 20.2984 3.70186 16.5831 3.70186 12.0001ZM12.0001 1.90186C6.423 1.90186 1.90186 6.423 1.90186 12.0001C1.90186 17.5772 6.423 22.0984 12.0001 22.0984C17.5772 22.0984 22.0984 17.5772 22.0984 12.0001C22.0984 6.423 17.5772 1.90186 12.0001 1.90186ZM15.6197 10.7395C15.9712 10.388 15.9712 9.81819 15.6197 9.46672C15.2683 9.11525 14.6984 9.11525 14.347 9.46672L11.1894 12.6243L9.6533 11.0883C9.30183 10.7368 8.73198 10.7368 8.38051 11.0883C8.02904 11.4397 8.02904 12.0096 8.38051 12.3611L10.553 14.5335C10.7217 14.7023 10.9507 14.7971 11.1894 14.7971C11.428 14.7971 11.657 14.7023 11.8257 14.5335L15.6197 10.7395Z"
                    fill=""
                ></path>
            </svg>
        </div>
        <div>
            <h4
                class="text-center mb-1 text-sm font-semibold text-gray-800 dark:text-white/90"
            >
                {{ page.props.flash.success }}
            </h4>
        </div>
    </div>

    <div
        v-if="showError"
        class="rounded-xl border border-error-500 bg-error-50 p-4 dark:border-error-500/30 dark:bg-error-500/15"
    >
        <div class="flex items-start gap-3">
            <div class="-mt-0.5 text-error-500">
                <svg
                    class="fill-current"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M20.3499 12.0004C20.3499 16.612 16.6115 20.3504 11.9999 20.3504C7.38832 20.3504 3.6499 16.612 3.6499 12.0004C3.6499 7.38881 7.38833 3.65039 11.9999 3.65039C16.6115 3.65039 20.3499 7.38881 20.3499 12.0004ZM11.9999 22.1504C17.6056 22.1504 22.1499 17.6061 22.1499 12.0004C22.1499 6.3947 17.6056 1.85039 11.9999 1.85039C6.39421 1.85039 1.8499 6.3947 1.8499 12.0004C1.8499 17.6061 6.39421 22.1504 11.9999 22.1504ZM13.0008 16.4753C13.0008 15.923 12.5531 15.4753 12.0008 15.4753L11.9998 15.4753C11.4475 15.4753 10.9998 15.923 10.9998 16.4753C10.9998 17.0276 11.4475 17.4753 11.9998 17.4753L12.0008 17.4753C12.5531 17.4753 13.0008 17.0276 13.0008 16.4753ZM11.9998 6.62898C12.414 6.62898 12.7498 6.96476 12.7498 7.37898L12.7498 13.0555C12.7498 13.4697 12.414 13.8055 11.9998 13.8055C11.5856 13.8055 11.2498 13.4697 11.2498 13.0555L11.2498 7.37898C11.2498 6.96476 11.5856 6.62898 11.9998 6.62898Z"
                        fill="#F04438"
                    ></path>
                </svg>
            </div>

            <div>
                <h4
                    class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90"
                >
                    {{ page.props.flash.error }}
                </h4>
            </div>
        </div>
    </div>
</template>
