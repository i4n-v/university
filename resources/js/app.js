import axios from "axios";
import Alpine from "alpinejs";
import "./bootstrap";

const axiosIntance = axios.create({
    headers: {
        "X-CSRF-TOKEN": document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
    },
});

window.Alpine = Alpine;

(function () {
    let message = document.getElementById("message");

    if (message) {
        setTimeout(() => message.remove(), 5000);
    }
})();

window.university = {
    cleanUniversity() {
        window.university = {
            ...window.university,
            name: null,
            location: null,
            students_number: null,
            teachers_number: null,
            most_popular_course: null,
        };
    },

    async deleteUniversity(id) {
        await axiosIntance.delete(`/university/${id}`);
        window.location.href = "dashboard";
    },

    setIdentifier(id) {
        window.university.identifier = id;
    },

    async getUniversity(id) {
        if (id) {
            const response = await axiosIntance.get(`/university/${id}`);
            const universityData = response.data;
            const entries = Object.entries(universityData);

            entries.forEach(([key, value]) => {
                const element = document.getElementById(`edit-${key}`);
                if(element) element.value = value;
            });

            const form = document.querySelector('form#edit');
            form.action = `/university/${id}`;
        }
    },
};

Alpine.start();
