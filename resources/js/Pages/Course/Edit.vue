<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import UpdateCourseForm from "./Partials/UpdateCourseForm.vue";
import DangerButton from "@/Components/DangerButton.vue";

const props = defineProps({
    course: Object,
});

const handleDeleteClickButton = () => {
    if (confirm("Deseja mesmo deletar este curso?")) {
        Inertia.delete(`/courses/${props.course.id}`);
    }
};
</script>

<template>
    <Head title="Course" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar "{{ props.course.name }}"
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <UpdateCourseForm :course="props.course" class="max-w-xl" />
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <p class="mb-4 text-sm max-w-xl text-gray-600">
                        Depois que o curso for excluído, os seus recursos e
                        dados serão excluídos permanentemente.
                    </p>
                    <DangerButton
                        class="text-red-600 hover:underline"
                        tabindex="-1"
                        type="button"
                        @click="handleDeleteClickButton"
                        >Deletar Curso</DangerButton
                    >
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
