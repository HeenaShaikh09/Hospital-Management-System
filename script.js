const departments = [
    { name: "Cardiology", logo: "images/rb_9817.png" },
    { name: "Neurology", logo: "images/neuro.png" },
    { name: "Pediatrics", logo: "images/rb_10114.png" },
    { name: "Orthopedics", logo: "images/rb_388.png" },
    { name: "Radiology", logo: "images/rb_52765.png" },
    { name: "Emergency", logo: "images/rb_25291.png" },
];

const departmentsContainer = document.getElementById("departments");

departments.forEach(department => {
    const div = document.createElement("div");
    div.className = "department";
    div.innerHTML = `
        <img src="${department.logo}" alt="${department.name} Logo">
        <h3>${department.name}</h3>
    `;
    departmentsContainer.appendChild(div);
});
