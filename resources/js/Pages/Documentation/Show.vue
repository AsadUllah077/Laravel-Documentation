<template>
    <DocumentationLayout :categories="categories" :currentTopic="currentTopic">
        <div class="max-w-4xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="flex items-center text-sm text-gray-500 mb-6">
                <Link href="/" class="hover:text-indigo-600">Home</Link>
                <span class="mx-2">/</span>
                <span class="hover:text-indigo-600">{{ currentTopic.category.name }}</span>
                <span class="mx-2">/</span>
                <span class="text-gray-900 font-medium">{{ currentTopic.title }}</span>
            </nav>

            <!-- Title and Description -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ currentTopic.title }}</h1>
                <p class="text-lg text-gray-600">{{ currentTopic.description }}</p>
            </div>

            <!-- Content -->
            <div class="prose prose-indigo max-w-none">
                <div v-html="currentTopic.content"></div>
            </div>

            <!-- Image (if available) -->
            <div v-if="currentTopic.image_path" class="mt-8">
                <img
                    :src="currentTopic.image_path"
                    :alt="currentTopic.title"
                    class="rounded-lg shadow-lg max-w-full"
                />
            </div>

            <!-- Navigation -->
            <div class="mt-12 pt-8 border-t border-gray-200 flex justify-between">
                <Link
                    v-if="previousTopic"
                    :href="`/docs/${previousTopic.category_slug}/${previousTopic.slug}`"
                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors"
                >
                    ← Previous: {{ previousTopic.title }}
                </Link>
                <span v-else class="px-4 py-2 bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                    ← Previous
                </span>
                <Link
                    v-if="nextTopic"
                    :href="`/docs/${nextTopic.category_slug}/${nextTopic.slug}`"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors"
                >
                    Next: {{ nextTopic.title }} →
                </Link>
                <span v-else class="px-4 py-2 bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                    Next →
                </span>
            </div>
        </div>
    </DocumentationLayout>
</template>

<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import DocumentationLayout from '@/Layouts/DocumentationLayout.vue';

const props = defineProps({
    categories: {
        type: Array,
        required: true,
    },
    currentTopic: {
        type: Object,
        required: true,
    },
});

// Flatten all topics to find previous and next
const allTopics = computed(() => {
    const topics = [];
    props.categories.forEach((category) => {
        category.topics.forEach((topic) => {
            topics.push({ ...topic, category_slug: category.slug });
        });
    });
    return topics;
});

const currentIndex = computed(() => {
    return allTopics.value.findIndex((t) => t.slug === props.currentTopic.slug);
});

const previousTopic = computed(() => {
    return currentIndex.value > 0 ? allTopics.value[currentIndex.value - 1] : null;
});

const nextTopic = computed(() => {
    return currentIndex.value < allTopics.value.length - 1
        ? allTopics.value[currentIndex.value + 1]
        : null;
});
</script>
