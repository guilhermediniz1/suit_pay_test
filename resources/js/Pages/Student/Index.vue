<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Pagination from "@/Components/Pagination.vue";

defineProps({
    students: Object,
});
</script>

<template>
    <Head title="Alunos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Alunos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="py-3 flex justify-end">
                    <Link href="/students/create">
                        <PrimaryButton> Adicionar Aluno </PrimaryButton>
                    </Link>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="w-full whitespace-nowrap">
                                <tr class="text-left font-bold">
                                    <th scope="col" class="px-6 py-4">ID</th>
                                    <th scope="col" class="px-6 py-4">Nome</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="student in students.data"
                                    :key="student.id"
                                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                                >
                                    <td class="border-t">
                                        <Link
                                            class="flex items-center px-6 py-4 focus:text-indigo-500"
                                            :href="`/students/${student.id}/edit`"
                                        >
                                            {{ student.id }}
                                        </Link>
                                    </td>
                                    <td class="border-t">
                                        <Link
                                            class="flex items-center px-6 py-4"
                                            :href="`/students/${student.id}/edit`"
                                            tabindex="-1"
                                        >
                                            {{ student.name }}
                                        </Link>
                                    </td>
                                </tr>
                                <tr v-if="students.length === 0">
                                    <td class="px-6 py-4 border-t" colspan="4">
                                        Nenhum aluno encontrado.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <Pagination :links="students.links" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
