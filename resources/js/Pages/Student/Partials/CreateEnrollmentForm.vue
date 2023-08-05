<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";
import { onBeforeMount, ref } from "vue";

const props = defineProps({
    student: Object,
});

const courses = ref(null);

const form = useForm({
    student_id: props.student.id,
    course_id: 0,
    enrollment_deadline: null,
});

onBeforeMount(() => {
    fetch(`/api/available-courses`)
        .then((res) => res.json())
        .then((data) => (courses.value = data));
});

const handleFormSubmit = () => {
    form.post(`/enrollments`, {
        preserveScroll: true,
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="mt-6 text-lg font-medium text-gray-900">
                Matricular aluno
            </h2>
        </header>

        <form @submit.prevent="handleFormSubmit" class="mt-2 space-y-6">
            <div>
                <InputLabel for="course_id" value="Curso" />

                <select
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    id="course_id"
                    v-model="form.course_id"
                    required
                >
                    <option value="" selected disabled>
                        Selecione um curso
                    </option>
                    <option v-for="course in courses" :value="course.id">
                        {{ course.name }}
                    </option>
                </select>

                <InputError class="mt-2" :message="form.errors.course_id" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing"
                    >Matricular</PrimaryButton
                >

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-gray-600"
                    >
                        Aluno matriculado com sucesso.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
