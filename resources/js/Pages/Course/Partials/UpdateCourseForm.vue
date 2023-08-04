<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Checkbox from "@/Components/Checkbox.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    course: Object,
});

const form = useForm({
    id: props.course.id,
    name: props.course.name,
    enrollment_deadline: props.course.enrollment_deadline,
    is_online: props.course.is_online ? true : false,
    vacancies: String(props.course.vacancies),
});

const handleFormSubmit = () => {
    form.put(`/courses/${props.course.id}`, {
        preserveScroll: true,
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Informações do Curso
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Atualize as informações do curso
                <strong>"{{ course.name }}"</strong>.
            </p>
        </header>

        <form @submit.prevent="handleFormSubmit" class="mt-6 space-y-6">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel
                    for="enrollment_deadline"
                    value="Data Final para Inscrições"
                />

                <TextInput
                    id="enrollment_deadline"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.enrollment_deadline"
                    required
                    autocomplete="username"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.enrollment_deadline"
                />
            </div>

            <div>
                <InputLabel for="vacancies" value="Vagas Restantes" />

                <TextInput
                    id="vacancies"
                    type="number"
                    min="0"
                    class="mt-1 block"
                    v-model="form.vacancies"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.vacancies" />
            </div>

            <div>
                <InputLabel for="is_online" value="Remoto" />

                <Checkbox
                    id="is_online"
                    class="mt-1 block"
                    :checked="form.is_online"
                    @change="form.is_online = !form.is_online"
                />

                <InputError class="mt-2" :message="form.errors.is_online" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing"
                    >Salvar Alterações</PrimaryButton
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
                        Salvo.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
