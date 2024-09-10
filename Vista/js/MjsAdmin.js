// Suponiendo que el nombre del usuario está guardado en una variable
const userName = "Administrador"; // Reemplaza esto con el nombre real del usuario

document.addEventListener('DOMContentLoaded', (event) => {
    const userIconLink = document.getElementById('user-icon-link');
    userIconLink.addEventListener('click', () => {
        alert(`Bienvenido, ${userName}!`);
    });
});
