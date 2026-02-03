<template>
    <DocumentationLayout :categories="categories">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Laravel Documentation</h1>
                <p class="text-xl text-gray-600">
                    Learn how to build modern web applications with Laravel, the PHP framework for artisans.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div
                    v-for="category in categories"
                    :key="category.id"
                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow"
                >
                    <div class="flex items-center mb-4">
                        <span class="text-3xl mr-3">{{ category.icon }}</span>
                        <h2 class="text-xl font-semibold text-gray-900">{{ category.name }}</h2>
                    </div>
                    <p class="text-gray-600 mb-4">{{ category.description }}</p>
                    <ul class="space-y-2">
                        <li v-for="topic in category.topics.slice(0, 3)" :key="topic.id">
                            <Link
                                :href="`/docs/${category.slug}/${topic.slug}`"
                                class="text-indigo-600 hover:text-indigo-800 text-sm flex items-center"
                            >
                                <span class="mr-2">→</span>
                                {{ topic.title }}
                            </Link>
                        </li>
                    </ul>
                    <Link
                        v-if="category.topics.length > 3"
                        :href="`/docs/${category.slug}/${category.topics[0].slug}`"
                        class="text-indigo-600 hover:text-indigo-800 text-sm font-medium mt-4 inline-block"
                    >
                        View all {{ category.topics.length }} topics →
                    </Link>
                </div>
            </div>
        </div>
    </DocumentationLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import DocumentationLayout from '@/Layouts/DocumentationLayout.vue';

defineProps({
    categories: {
        type: Array,
        required: true,
    },
});
</script>
