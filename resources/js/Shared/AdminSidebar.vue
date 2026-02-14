<script setup>
import { inject, ref } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
const page = usePage();
const sidebarToggle = inject("sidebarToggle", ref(false));
const selected = ref("Dashboard");

function closeSidebar() {
    if (sidebarToggle && sidebarToggle.value) {
        sidebarToggle.value = false;
    }
}
</script>
<template>
    <div :class="{ 'sidebar-open': sidebarToggle }" @click="closeSidebar">
        <aside
            :class="
                sidebarToggle
                    ? 'translate-x-0 lg:w-[90px]'
                    : '-translate-x-full'
            "
            class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 duration-300 ease-linear dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0"
            @click.stop
        >
            <!-- SIDEBAR HEADER -->
            <div
                :class="sidebarToggle ? 'justify-center' : 'justify-between'"
                class="sidebar-header flex items-center gap-2 pb-7 pt-8"
            >
                <Link :href="route('adminDashboard')">
                    <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                        {{ page.props.appName }}
                        <!-- Project logo goes here... -->
                    </span>
                </Link>
            </div>
            <!-- SIDEBAR HEADER -->

            <div
                class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear"
            >
                <!-- Sidebar Menu -->
                <nav>
                    <!-- Menu Group -->
                    <div>
                        <ul class="mb-6 flex flex-col gap-4">
                            <!-- Menu Item Dashboard -->
                            <li>
                                <Link
                                    :href="route('adminDashboard')"
                                    @click.prevent="
                                        selected =
                                            selected === 'Dashboard'
                                                ? ''
                                                : 'Dashboard'
                                    "
                                    class="menu-item group"
                                    :class="
                                        selected === 'Dashboard'
                                            ? 'menu-item-active'
                                            : 'menu-item-inactive'
                                    "
                                >
                                    <svg
                                        :class="
                                            selected === 'Dashboard'
                                                ? 'menu-item-icon-active'
                                                : 'menu-item-icon-inactive'
                                        "
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                                            fill=""
                                        />
                                    </svg>

                                    <span
                                        class="menu-item-text"
                                        :class="
                                            sidebarToggle ? 'lg:hidden' : ''
                                        "
                                    >
                                        Dashboard
                                    </span>
                                </Link>

                                <!-- Dropdown Menu Start -->
                                <div
                                    class="translate transform overflow-hidden"
                                    :class="
                                        selected === 'Dashboard'
                                            ? 'block'
                                            : 'hidden'
                                    "
                                ></div>
                                <!-- Dropdown Menu End -->
                            </li>
                            <!-- Menu Item Dashboard -->

                            <!-- Menu Item Task -->
                            <!-- <li>
                                <a
                                    href="#"
                                    @click.prevent="
                                        selected =
                                            selected === 'Task' ? '' : 'Task'
                                    "
                                    class="menu-item group"
                                    :class="
                                        selected === 'Task' ||
                                        page === 'taskList' ||
                                        page === 'taskKanban'
                                            ? 'menu-item-active'
                                            : 'menu-item-inactive'
                                    "
                                >
                                    <svg
                                        :class="
                                            selected === 'Task' ||
                                            page === 'taskList' ||
                                            page === 'taskKanban'
                                                ? 'menu-item-icon-active'
                                                : 'menu-item-icon-inactive'
                                        "
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M7.75586 5.50098C7.75586 5.08676 8.09165 4.75098 8.50586 4.75098H18.4985C18.9127 4.75098 19.2485 5.08676 19.2485 5.50098L19.2485 15.4956C19.2485 15.9098 18.9127 16.2456 18.4985 16.2456H8.50586C8.09165 16.2456 7.75586 15.9098 7.75586 15.4956V5.50098ZM8.50586 3.25098C7.26322 3.25098 6.25586 4.25834 6.25586 5.50098V6.26318H5.50195C4.25931 6.26318 3.25195 7.27054 3.25195 8.51318V18.4995C3.25195 19.7422 4.25931 20.7495 5.50195 20.7495H15.4883C16.7309 20.7495 17.7383 19.7421 17.7383 18.4995L17.7383 17.7456H18.4985C19.7411 17.7456 20.7485 16.7382 20.7485 15.4956L20.7485 5.50097C20.7485 4.25833 19.7411 3.25098 18.4985 3.25098H8.50586ZM16.2383 17.7456H8.50586C7.26322 17.7456 6.25586 16.7382 6.25586 15.4956V7.76318H5.50195C5.08774 7.76318 4.75195 8.09897 4.75195 8.51318V18.4995C4.75195 18.9137 5.08774 19.2495 5.50195 19.2495H15.4883C15.9025 19.2495 16.2383 18.9137 16.2383 18.4995L16.2383 17.7456Z"
                                            fill=""
                                        />
                                    </svg>

                                    <span
                                        class="menu-item-text"
                                        :class="
                                            sidebarToggle ? 'lg:hidden' : ''
                                        "
                                    >
                                        Task
                                    </span>

                                    <svg
                                        class="menu-item-arrow"
                                        :class="[
                                            selected === 'Task'
                                                ? 'menu-item-arrow-active'
                                                : 'menu-item-arrow-inactive',
                                            sidebarToggle ? 'lg:hidden' : '',
                                        ]"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 20 20"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585"
                                            stroke=""
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </a>

                                
                                <div
                                    class="translate transform overflow-hidden"
                                    :class="
                                        selected === 'Task' ? 'block' : 'hidden'
                                    "
                                >
                                    <ul
                                        :class="
                                            sidebarToggle ? 'lg:hidden' : 'flex'
                                        "
                                        class="menu-dropdown mt-2 flex flex-col gap-1 pl-9"
                                    >
                                        <li>
                                            <a
                                                href="task-list.html"
                                                class="menu-dropdown-item group"
                                                :class="
                                                    page === 'taskList'
                                                        ? 'menu-dropdown-item-active'
                                                        : 'menu-dropdown-item-inactive'
                                                "
                                            >
                                                List
                                                <span
                                                    class="absolute right-3 flex items-center gap-1"
                                                >
                                                    <span
                                                        class="menu-dropdown-badge"
                                                        :class="
                                                            page === 'taskList'
                                                                ? 'menu-dropdown-badge-active'
                                                                : 'menu-dropdown-badge-inactive'
                                                        "
                                                    >
                                                        Pro
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="task-kanban.html"
                                                class="menu-dropdown-item group"
                                                :class="
                                                    page === 'taskKanban'
                                                        ? 'menu-dropdown-item-active'
                                                        : 'menu-dropdown-item-inactive'
                                                "
                                            >
                                                Kanban
                                                <span
                                                    class="absolute right-3 flex items-center gap-1"
                                                >
                                                    <span
                                                        class="menu-dropdown-badge"
                                                        :class="
                                                            page ===
                                                            'taskKanban'
                                                                ? 'menu-dropdown-badge-active'
                                                                : 'menu-dropdown-badge-inactive'
                                                        "
                                                    >
                                                        Pro
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                
                            </li> -->
                            <!-- Menu Item Task -->
                        </ul>
                    </div>
                </nav>
                <!-- Sidebar Menu -->
            </div>
        </aside>
    </div>
</template>
