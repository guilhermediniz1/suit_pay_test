<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    links: Array,
});
</script>

<template>
    <div class="pt-5" v-if="links.length > 3">
        <div class="flex gap-1 items-center justify-center flex-wrap">
            <div v-for="(link, key) in links" class="min-h-[2.5rem] text-sm leading-4">
                <div v-if="link.url === null" :key="key" class="px-4 py-3 text-gray-400 border rounded" v-html="link.label"/>
                <Link v-else
                      :key="`link-${key}`"
                      class="block px-4 py-3 focus:text-indigo-500 bg-neutral-50 hover:bg-white border focus:border-indigo-500 rounded"
                      :class="{ 'bg-white border-indigo-500 text-indigo-500': link.active }"
                      :href="link.url"
                      v-html="link.label"
                />
            </div>
        </div>
    </div>
</template>
