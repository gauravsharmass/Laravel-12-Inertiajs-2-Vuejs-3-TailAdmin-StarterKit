<script setup>
defineProps({
    type: {
        type: String,
        default: "button",
    },
    variant: {
        type: String,
        default: "primary",
        validator: (value) => ["primary", "secondary"].includes(value),
    },
    disabled: {
        type: Boolean,
        default: false,
    },
});
</script>
<template>
    <button
        :type="type"
        :disabled="disabled"
        :class="[
            'px-4 py-2 rounded-lg font-medium transition',
            variant === 'primary'
                ? 'bg-blue-600 text-white hover:bg-blue-700 disabled:bg-blue-400'
                : 'bg-gray-300 text-gray-700 hover:bg-gray-400 disabled:bg-gray-200',
        ]"
    >
        <slot />
    </button>
</template>
