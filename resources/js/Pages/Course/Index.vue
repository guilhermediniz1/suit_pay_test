<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({
    courses: Object,
});
</script>

<template>
    <Head title="Cursos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Cursos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="py-3 flex justify-end">
                    <Link href="/courses/create">
                        <PrimaryButton> Adicionar Curso </PrimaryButton>
                    </Link>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="w-full whitespace-nowrap">
                                <tr class="text-left font-bold">
                                    <th scope="col" class="px-6 py-4">Nome</th>
                                    <th scope="col" class="px-6 py-4">
                                        Remoto
                                    </th>
                                    <th scope="col" class="px-6 py-4">
                                        Inscrições Até
                                    </th>
                                    <th scope="col" class="px-6 py-4">Vagas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="course in courses"
                                    :key="course.id"
                                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                                >
                                    <td class="border-t">
                                        <Link
                                            class="flex items-center px-6 py-4 focus:text-indigo-500"
                                            :href="`/courses/${course.id}/edit`"
                                        >
                                            {{ course.name }}
                                        </Link>
                                    </td>
                                    <td class="border-t">
                                        <Link
                                            class="flex items-center px-6 py-4"
                                            :href="`/courses/${course.id}/edit`"
                                            tabindex="-1"
                                        >
                                            {{ course.is_online }}
                                        </Link>
                                    </td>
                                    <td class="border-t">
                                        <Link
                                            class="flex items-center px-6 py-4"
                                            :href="`/courses/${course.id}/edit`"
                                            tabindex="-1"
                                        >
                                            {{ course.enrollment_deadline }}
                                        </Link>
                                    </td>
                                    <td class="border-t">
                                        <Link
                                            class="flex items-center px-6 py-4"
                                            :href="`/courses/${course.id}/edit`"
                                            tabindex="-1"
                                        >
                                            {{ course.vacancies }}
                                        </Link>
                                    </td>
                                </tr>
                                <tr v-if="courses.length === 0">
                                    <td class="px-6 py-4 border-t" colspan="4">
                                        Nenhum curso encontrado
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
