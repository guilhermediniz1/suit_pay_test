<script setup>
import IconDelete from "@/Components/Icons/Delete.vue";
import { Inertia } from "@inertiajs/inertia";

defineProps({
    enrollments: Array,
});

const handleDeleteEnrollment = (enrollmentId) => {
    if (confirm("Tem certeza que deseja remover esta matrícula?")) {
        Inertia.delete(`/enrollments/${enrollmentId}`, {
            preserveScroll: true,
        });
    }
};
</script>
<template>
    <h2 class="text-lg font-medium text-gray-900">Cursos Matriculados</h2>
    <p
        class="my-3 text-sm max-w-xl text-gray-600"
        v-if="enrollments.length == 0"
    >
        Este aluno não está matriculado em nenhum curso.
    </p>
    <div class="pt-3 grid gap-2" v-else>
        <div
            class="p-3 max-w-xl flex items-center justify-between border rounded-lg shadow-sm text-gray-600"
            v-for="enrollment in enrollments"
        >
            {{ enrollment.course.name }}
            <button
                @click="handleDeleteEnrollment(enrollment.id)"
                class="transition-all duration-300 fill-neutral-400 hover:fill-neutral-600"
            >
                <IconDelete />
            </button>
        </div>
    </div>
</template>
