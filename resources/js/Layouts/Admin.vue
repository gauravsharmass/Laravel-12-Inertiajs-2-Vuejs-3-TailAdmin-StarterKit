<script setup>
import { ref, provide } from "vue";
import AdminSidebar from "../Shared/AdminSidebar.vue";
import Header from "../Shared/Header.vue";
import FlashMessage from "../Components/FlashMessage.vue";

const sidebarToggle = ref(false);
provide("sidebarToggle", sidebarToggle);
</script>

<template>
    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
        <!-- ===== Sidebar Start ===== -->
        <AdminSidebar />
        <!-- ===== Sidebar End ===== -->

        <!-- ===== Content Area Start ===== -->
        <div
            class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden"
        >
            <!-- ===== Header Start ===== -->
            <Header />
            <!-- ===== Header End ===== -->
            <div class="px-6 py-4">
                <FlashMessage />
            </div>

            <!-- ===== Main Content Start ===== -->
            <slot />
            <!-- ===== Main Content End ===== -->
        </div>
        <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
</template>
