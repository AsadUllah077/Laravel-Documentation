<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Header -->
        <header class="bg-indigo-600 text-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <Link href="/" class="text-xl font-bold">
                            Laravel Documentation
                        </Link>
                    </div>
                    <div class="flex items-center space-x-4 relative">
                        <div class="relative">
                            <input
                                v-model="searchQuery"
                                @input="search"
                                type="text"
                                placeholder="Search documentation..."
                                class="px-4 py-2 rounded-lg bg-indigo-700 text-white placeholder-indigo-300 focus:outline-none focus:ring-2 focus:ring-white w-64"
                            />
                            <!-- Search Results Dropdown -->
                            <div
                                v-if="searchResults.length > 0"
                                class="absolute right-0 mt-2 w-96 bg-white rounded-lg shadow-xl z-50 max-h-96 overflow-y-auto"
                            >
                                <ul class="py-2">
                                    <li v-for="(result, index) in searchResults" :key="index">
                                        <Link
                                            :href="result.url"
                                            class="block px-4 py-2 text-gray-700 hover:bg-indigo-50"
                                        >
                                            <div class="font-medium text-indigo-600">{{ result.title }}</div>
                                            <div class="text-sm text-gray-500">{{ result.category }}</div>
                                        </Link>
                                    </li>
                                </ul>
                            </div>
                            <!-- No Results -->
                            <div
                                v-else-if="searchQuery.length > 2 && searching"
                                class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl z-50 p-4 text-center text-gray-500"
                            >
                                No results found
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex max-w-7xl mx-auto">
            <!-- Sidebar -->
            <aside class="w-72 min-h-screen bg-white border-r border-gray-200 overflow-y-auto">
                <nav class="p-4">
                    <div v-for="category in categories" :key="category.id" class="mb-6">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2 flex items-center">
                            <span v-if="category.icon" class="mr-2">{{ category.icon }}</span>
                            {{ category.name }}
                        </h3>
                        <ul class="space-y-1">
                            <li v-for="topic in category.topics" :key="topic.id">
                                <Link
                                    :href="`/docs/${category.slug}/${topic.slug}`"
                                    :class="[
                                        'block px-3 py-2 rounded-lg text-sm transition-colors',
                                        isActiveTopic(topic.slug)
                                            ? 'bg-indigo-100 text-indigo-700 font-medium'
                                            : 'text-gray-700 hover:bg-gray-100'
                                    ]"
                                >
                                    {{ topic.title }}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-8">
                <slot />
            </main>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    categories: {
        type: Array,
        required: true,
    },
    currentTopic: {
        type: Object,
        default: null,
    },
});

const searchQuery = ref('');
const searchResults = ref([]);
const searching = ref(false);
let debounceTimer = null;

const isActiveTopic = (slug) => {
    return props.currentTopic && props.currentTopic.slug === slug;
};

const search = () => {
    if (searchQuery.value.length < 3) {
        searchResults.value = [];
        return;
    }

    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(async () => {
        searching.value = true;
        try {
            const response = await fetch(`/search?q=${encodeURIComponent(searchQuery.value)}`);
            const data = await response.json();
            searchResults.value = data.results || [];
        } catch (error) {
            console.error('Search error:', error);
            searchResults.value = [];
        }
        searching.value = false;
    }, 300);
};
</script>
