<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CreateStudentForm from "./Partials/CreateStudentForm.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Criar Curso" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Cadastrar Aluno
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="p-4 sm:p-8 bg-white overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <CreateStudentForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
