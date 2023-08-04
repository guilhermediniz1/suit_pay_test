<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import UpdateStudentForm from "./Partials/UpdateStudentForm.vue";
import DangerButton from "@/Components/DangerButton.vue";

const props = defineProps({
    student: Object,
});

const handleDeleteClickButton = () => {
    if (confirm("Deseja mesmo deletar este aluno?")) {
        Inertia.delete(`/students/${props.student.id}`);
    }
};
</script>

<template>
    <Head title="Alunos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar "{{ props.student.name }}"
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <UpdateStudentForm
                            :student="props.student"
                            class="max-w-xl"
                        />
                    </div>
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <p class="mb-4 text-sm max-w-xl text-gray-600">
                            Depois que o aluno for excluído, os seus recursos e
                            dados serão excluídos permanentemente.
                        </p>
                        <DangerButton
                            tabindex="-1"
                            @click="handleDeleteClickButton"
                            >Deletar Aluno</DangerButton
                        >
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
