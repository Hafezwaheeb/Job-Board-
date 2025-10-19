document.addEventListener('DOMContentLoaded', function () {
    const profileToggle = document.querySelector('.profile-toggle');
    if (!profileToggle) return;

    const dropdown = document.querySelector('.profile-dropdown');
    if (!dropdown) return;

    profileToggle.addEventListener('click', function (e) {
        e.stopPropagation();
        const isExpanded = profileToggle.getAttribute('aria-expanded') === 'true';
        profileToggle.setAttribute('aria-expanded', !isExpanded);
        dropdown.classList.toggle('hidden');
    });

    document.addEventListener('click', function () {
        profileToggle.setAttribute('aria-expanded', 'false');
        dropdown.classList.add('hidden');
    });
});
